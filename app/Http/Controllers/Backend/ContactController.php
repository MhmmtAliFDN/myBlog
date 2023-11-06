<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\text;

class ContactController extends Controller
{
    public function index() {
        $contacts = $this->getAll();
        return view('backend.pages.contact',compact('contacts'));
    }

    public function add(Request $request) {
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

        Contact::create([
            'name' => $request->my_modal_name,
            'email' => $request->my_modal_email,
            'phone' => $request->my_modal_phone,
            'title' => $request->my_modal_title,
            'content' => $request->my_modal_content,
            'status' => $request->my_modal_status,
        ]);

        return response()->json(['message' => 'İletişim Başarıyla Eklendi'], 200);
    }

    public function delete(Request $request) {
        try {
            Contact::where('id', $request->id)->first()->delete();
            return response(['message' => 'İletişim başarıyla silindi'], 200);
        } catch (\Throwable $th) {
            return response(['message' => 'Sistemsel bir hata oluştu'], 500);
        }
    }

    public function update(Request $request) {
        $request->merge([
            'id' => $request->input('my_modal_id'),
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



        Contact::where('id', $request->my_modal_id)->update([
            'name' => $request->my_modal_name,
            'email' => $request->my_modal_email,
            'phone' => $request->my_modal_phone,
            'title' => $request->my_modal_title,
            'content' => $request->my_modal_content,
            'status' => $request->my_modal_status,
        ]);

        return response()->json(['message' => 'İletişim Başarıyla Eklendi'], 200);
    }

    public function statusUpdate(Request $request) {
        try {
            Contact::where('id', $request->id)->first()->update(['status' => $request->status]);
            return response(['message' => 'Durum başarıyla güncellendi'], 200);
        } catch (\Throwable $th) {
            return response(['message' => 'Sistemsel bir hata oluştu'], 500);
        }
    }

    public function get(Request $request) {
        try {
            $contact = Contact::where('id', $request->id)->first();
            return response(['data' => $contact, 200]);
        } catch (\Throwable $th) {
            return response(['message' => 'Sistemsel bir hata oluştu. Veriler getirelemedi.'], 500);
        }
    }

    public function getAll() {
        return Contact::all();
    }
}
