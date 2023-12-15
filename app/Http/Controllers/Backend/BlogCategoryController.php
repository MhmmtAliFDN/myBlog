<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Validation\BlogCategoryValidator;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $categories = $this->getAll();
        return view('backend.pages.blog_category',compact('categories'));
    }

    public function add(Request $request)
    {
        $blogCategoryValidator = new BlogCategoryValidator();
        $validator = Validator::make($request->all(), $blogCategoryValidator->rules(), $blogCategoryValidator->messages());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        BlogCategory::create([
            'name' => $request->name,
            'status' => $request->status,
            'slug' => Str::slug($request->name),
        ]);

        return response()->json(['message' => 'Kategori Başarıyla Eklendi'], 200);
    }

    public function delete(Request $request) {
        try {
            $blogCategory = BlogCategory::find($request->id);
            $blogCategory->delete();

            return response(['message' => 'Kategori başarıyla silindi'], 200);
        } catch (\Throwable $th) {
            return response(['message' => 'Sistemsel bir hata oluştu'], 500);
        }
    }

    public function deleteMultiple(Request $request)
    {
        $ids = $request->ids;
        foreach ($ids as $id) {
            $id = (int) $id;

            try {
                $blogCategory = BlogCategory::find($id);
                $blogCategory->delete();
            } catch (\Throwable $th) {
                return response(['message' => 'Sistemsel bir hata oluştu'], 500);
            }
        }
        return response(['message' => 'Kategoriler başarıyla silindi'], 200);
    }

    public function update(Request $request)
    {
        $oldBlogCategory = BlogCategory::find($request->id);

        $blogCategoryValidator = new BlogCategoryValidator();
        $validator = Validator::make($request->all(), $blogCategoryValidator->rules($oldBlogCategory), $blogCategoryValidator->messages());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        BlogCategory::where('id', $request->id)->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'status' => $request->status,
        ]);

        return response()->json(['message' => 'Kategori Başarıyla Güncellendi'], 200);
    }

    public function statusUpdate(Request $request)
    {
        try {
            BlogCategory::where('id', $request->id)->first()->update(['status' => $request->status]);
            return response(['message' => 'Kategori başarıyla güncellendi'], 200);
        } catch (\Throwable $th) {
            return response(['message' => 'Sistemsel bir hata oluştu'], 500);
        }
    }

    public function get(Request $request)
    {
        try {
            $category = BlogCategory::where('id', $request->id)->first();
            return response(['data' => $category, 200]);
        } catch (\Throwable $th) {
            return response(['message' => 'Sistemsel bir hata oluştu. Veriler getirelemedi.'], 500);
        }
    }

    public function getAll() {
        return BlogCategory::all();
    }
}
