<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Validation\BlogValidator;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = $this->getAll();
        $categories = BlogCategory::get();
        return view('backend.pages.blog', compact('blogs', 'categories'));
    }

    public function add(Request $request)
    {
        $blogValidator = new BlogValidator();
        $validator = Validator::make($request->all(), $blogValidator->rules(), $blogValidator->messages());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($request->hasFile('image')) {
            $imageName = ImageHelper::upload($request->file('image'), Str::slug($request->name), $request->segment(2));
            if ($imageName) {
                Blog::create([
                    'user_id' => Auth::user()->id,
                    'category_id' => $request->category,
                    'name' => $request->name,
                    'slug' => Str::slug($request->name),
                    'image' => $imageName,
                    'content' => $request->content,
                    'status' => $request->status,
                ]);

                return response()->json(['message' => 'Blog Başarıyla Eklendi'], 200);
            }
        }
    }

    public function delete(Request $request)
    {
        try {
            $blog = Blog::find($request->id);
            ImageHelper::delete($blog->image, $request->segment(2));
            $blog->delete();

            return response(['message' => 'İletişim başarıyla silindi'], 200);
        } catch (\Throwable $th) {
            return response(['message' => $th->getMessage()], 500);
        }
    }

    public function update(Request $request)
    {
        $blogValidator = new BlogValidator();
        $validator = Validator::make($request->all(), $blogValidator->rules(), $blogValidator->messages());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($request->hasFile('image')) {
            $oldImage = Blog::find($request->id)->image;
            dd($oldImage);
            $imageName = ImageHelper::update($request->my_modal_image, Str::slug($request->my_modal_name), $request->segment(2), $oldImage);
            if ($imageName) {
                Blog::where('id', $request->id)->update([
                    'name' => $request->name,
                    'category_id' => $request->category,
                    'content' => $request->content,
                    'status' => $request->status,
                ]);
            }
        }

        return response()->json(['message' => 'İletişim Başarıyla Güncellendi'], 200);
    }

    public function statusUpdate(Request $request)
    {
        try {
            Blog::where('id', $request->id)->first()->update(['status' => $request->status]);
            return response(['message' => 'Durum başarıyla güncellendi'], 200);
        } catch (\Throwable $th) {
            return response(['message' => 'Sistemsel bir hata oluştu'], 500);
        }
    }

    public function get(Request $request)
    {
        try {
            $blog = Blog::where('id', $request->id)->first();
            $user = Blog::find($request->id)->user->name;
            $category = Blog::find($request->id)->category->name;
            return response(['data' => [$blog, $user, $category], 200]);
        } catch (\Throwable $th) {
            return response(['message' => 'Sistemsel bir hata oluştu. Veriler getirelemedi.'], 500);
        }
    }

    public function getAll()
    {
        return Blog::all();
    }
}
