<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class BlogCategoryController extends Controller
{
    public function index() {
        $categories = $this->getAll();
        return view('backend.pages.blog_category',compact('categories'));
    }

    public function add(Request $request) {
        $request->merge([
            'name' => $request->input('my_modal_name'),
            'status' => $request->input('my_modal_status'),
        ]);

        $rules = [
            'name' => ['required', 'min: 3', 'max: 50', 'unique:blog_categories'],
        ];

        $messages = [
            'name.required' => 'İsim alanı boş olamaz.',
            'name.min' => 'İsim 3 karakterden kısa olamaz.',
            'name.max' => 'İsim 50 karakterden uzun olamaz.',
            'name.unique' => 'Aynı isimde birden çok kategori olamaz.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        BlogCategory::create([
            'name' => $request->my_modal_name,
            'status' => $request->my_modal_status,
            'slug' => Str::slug($request->my_modal_name, '-'),
        ]);

        return response()->json(['message' => 'Kategori Başarıyla Eklendi'], 200);
    }

    public function delete(Request $request) {
        try {
            BlogCategory::where('id', $request->id)->first()->delete();
            return response(['message' => 'Kategori başarıyla silindi'], 200);
        } catch (\Throwable $th) {
            return response(['message' => 'Sistemsel bir hata oluştu'], 500);
        }
    }

    public function update(Request $request) {
        $request->merge([
            'name' => $request->input('my_modal_name'),
            'status' => $request->input('my_modal_status'),
        ]);

        $rules = [
            'name' => ['required', 'min: 3', 'max: 50', Rule::unique('blog_categories')->ignore($request->my_modal_id)],
        ];

        $messages = [
            'name.required' => 'İsim alanı boş olamaz.',
            'name.min' => 'İsim 3 karakterden kısa olamaz.',
            'name.max' => 'İsim 50 karakterden uzun olamaz.',
            'name.unique' => 'Aynı isimde birden çok kategori olamaz.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        BlogCategory::where('id', $request->my_modal_id)->first()->update([
            'name' => $request->my_modal_name,
            'slug' => Str::slug($request->my_modal_name, '-'),
            'status' => $request->my_modal_status,
        ]);

        return response()->json(['message' => 'Kategori Başarıyla Güncellendi'], 200);
    }

    public function statusUpdate(Request $request) {
        try {
            BlogCategory::where('id', $request->id)->first()->update(['status' => $request->status]);
            return response(['message' => 'Kategori başarıyla güncellendi'], 200);
        } catch (\Throwable $th) {
            return response(['message' => 'Sistemsel bir hata oluştu'], 500);
        }
    }

    public function get(Request $request) {
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
