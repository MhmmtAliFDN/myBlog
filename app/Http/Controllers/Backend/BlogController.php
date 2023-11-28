<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\ImageHelper;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\File;

class BlogController extends Controller
{
    public function index() {
        $blogs = $this->getAll();
        $categories = BlogCategory::get();
        return view('backend.pages.blog',compact('blogs','categories'));
    }

    public function add(Request $request) {
        $request->merge([
            'name' => $request->input('my_modal_name'),
            'content' => $request->input('my_modal_content'),
            'image' => $request->file('my_modal_image'),
        ]);

        $rules = [
            'name' => ['required', 'min: 5', 'max: 100', 'unique:blogs'],
            'content' => ['required', 'max: 65000'],
            'image' => ['required', 'image', 'max:2048'],
        ];

        $messages = [
            'name.required' => 'İsim alanı boş olamaz.',
            'name.min' => 'İsminiz 5 karakterden kısa olamaz.',
            'name.max' => 'İsminiz 100 karakterden uzun olamaz.',
            'name.unique' => 'Aynı isimde başka bir blog olamaz.',

            'content.required' => 'İçerik alanını boş olamaz.',
            'content.max' => 'Lütfen içeriği daha kısa yazınız.',

            'image.required' => 'Lütfen bir resim ekleyiniz.',
            'image.image' => 'Dosya resim formatında olmalıdır.',
            'image.max' => 'Dosya boyutu en fazla 2 MB(megabyte) olabilir.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        if ($request->hasFile('my_modal_image')) {
            $imageName = ImageHelper::upload($request->my_modal_image, Str::slug($request->my_modal_name));
            if ($imageName) {
                Blog::create([
                    'user_id' => Auth::user()->id,
                    'category_id' => $request->my_modal_category,
                    'name' => $request->my_modal_name,
                    'slug' => Str::slug($request->my_modal_name),
                    'image' => $imageName,
                    'content' => $request->my_modal_content,
                    'status' => $request->my_modal_status,
                ]);

                return response()->json(['message' => 'Blog Başarıyla Eklendi'], 200);
            }
        }
    }

    public function delete(Request $request) {
        try {
            Blog::where('id', $request->id)->first()->delete();
            return response(['message' => 'İletişim başarıyla silindi'], 200);
        } catch (\Throwable $th) {
            return response(['message' => 'Sistemsel bir hata oluştu'], 500);
        }
    }

    public function update(Request $request) {
        $request->merge([
            'name' => $request->input('my_modal_name'),
            'phone' => $request->input('my_modal_phone'),
            'email' => $request->input('my_modal_email'),
            'title' => $request->input('my_modal_title'),
            'content' => $request->input('my_modal_content'),
            'status' => $request->input('my_modal_status'),
        ]);

        $rules = [
            'name' => ['required', 'min: 5', 'max: 50'],
            'phone' => ['required', 'min:18'],
            'email' => ['required', 'email:rfc,dns', 'max: 50'],
            'title' => ['required', 'max: 100'],
            'content' => ['required', 'max: 500'],
        ];

        $messages = [
            'name.required' => 'İsim alanı boş olamaz.',
            'name.min' => 'İsminiz 5 karakterden kısa olamaz.',
            'name.max' => 'İsminiz 50 karakterden uzun olamaz.',

            'phone.required' => 'Telefon numarası alanı boş olamaz.',
            'phone.min' => 'Telefon numaranız 10 haneden kısa olamaz.',

            'email.required' => 'Lütfen e-posta alanını doldurunuz.',
            'email.max' => 'E-postanız 50 karakterden uzun olamaz.',
            'email.email' => 'Gerçek bir e-posta giriniz: ornek_eposta@gmail.com',

            'title.required' => 'Konu alanı boş olamaz.',
            'title.max' => 'Lütfen konuyu daha kısa yazınız.',

            'content.required' => 'İçerik alanını boş olamaz.',
            'content.max' => 'Lütfen içeriği daha kısa yazınız.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }



        Blog::where('id', $request->my_modal_id)->update([
            'name' => $request->my_modal_name,
            'email' => $request->my_modal_email,
            'phone' => $request->my_modal_phone,
            'title' => $request->my_modal_title,
            'content' => $request->my_modal_content,
            'status' => $request->my_modal_status,
        ]);

        return response()->json(['message' => 'İletişim Başarıyla Güncellendi'], 200);
    }

    public function statusUpdate(Request $request) {
        try {
            Blog::where('id', $request->id)->first()->update(['status' => $request->status]);
            return response(['message' => 'Durum başarıyla güncellendi'], 200);
        } catch (\Throwable $th) {
            return response(['message' => 'Sistemsel bir hata oluştu'], 500);
        }
    }

    public function get(Request $request) {
        try {
            $blog = Blog::where('id', $request->id)->first();
            $user = Blog::find($request->id)->user->name;
            $category = Blog::find($request->id)->category->name;
            return response(['data' => [$blog,$user,$category], 200]);
        } catch (\Throwable $th) {
            return response(['message' => 'Sistemsel bir hata oluştu. Veriler getirelemedi.'], 500);
        }
    }

    public function getAll() {
        return Blog::all();
    }
}
