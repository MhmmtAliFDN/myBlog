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
            $image = ImageHelper::upload($request->file('image'), Str::slug($request->name), $request->segment(2));
            if ($image) {
                Blog::create([
                    'user_id' => Auth::user()->id,
                    'category_id' => $request->category,
                    'name' => $request->name,
                    'slug' => Str::slug($request->name),
                    'image' => $image,
                    'summary' => $request->summary,
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

            return response(['message' => 'Blog başarıyla silindi'], 200);
        } catch (\Throwable $th) {
            return response(['message' => $th->getMessage()], 500);
        }
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;
        foreach ($ids as $id) {
            $id = (int) $id;

            try {
                $blog = Blog::find($id);
                ImageHelper::delete($blog->image, $request->segment(2));
                $blog->delete();
            } catch (\Throwable $th) {
                return response(['message' => $th->getMessage()], 500);
            }
        }
        return response(['message' => 'Bloglar başarıyla silindi'], 200);
    }

    public function update(Request $request)
    {
        $oldBlog = Blog::find($request->id);

        $blogValidator = new BlogValidator();
        $validator = Validator::make($request->all(), $blogValidator->rules($oldBlog), $blogValidator->messages());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $oldImage = $oldBlog->image;
        $image = ImageHelper::update($request->image, Str::slug($request->name), $request->segment(2), $oldImage);
        if ($image) {
            Blog::where('id', $request->id)->update([
                'category_id' => $request->category,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $image,
                'summary' => $request->summary,
                'content' => $request->content,
                'status' => $request->status,
            ]);
        }

        return response()->json(['message' => 'Blog Başarıyla Güncellendi'], 200);
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
            $image = asset($blog->image);
            return response(['data' => [$blog, $user, $category, $image], 200]);
        } catch (\Throwable $th) {
            return response(['message' => 'Sistemsel bir hata oluştu. Veriler getirelemedi.'], 500);
        }
    }

    public function getAll()
    {
        return Blog::all();
    }
}
