<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Validation\ContactValidator;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\text;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = $this->getAll();
        return view('backend.pages.contact',compact('contacts'));
    }

    public function add(Request $request)
    {
        $contactValidator = new ContactValidator();
        $validator = Validator::make($request->all(), $contactValidator->rules(), $contactValidator->messages());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
        ]);

        return response()->json(['message' => 'İletişim Başarıyla Eklendi'], 200);
    }

    public function delete(Request $request)
    {
        try {
            $contact = Contact::find($request->id);
            $contact->delete();

            return response(['message' => 'İletişim başarıyla silindi'], 200);
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
                $contact = Contact::find($id);
                $contact->delete();
            } catch (\Throwable $th) {
                return response(['message' => 'Sistemsel bir hata oluştu'], 500);
            }
        }
        return response(['message' => 'İletişimler başarıyla silindi'], 200);
    }

    public function update(Request $request)
    {
        $contactValidator = new ContactValidator();
        $validator = Validator::make($request->all(), $contactValidator->rules(), $contactValidator->messages());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        Contact::where('id', $request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
        ]);

        return response()->json(['message' => 'İletişim Başarıyla Güncellendi'], 200);
    }

    public function statusUpdate(Request $request)
    {
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
