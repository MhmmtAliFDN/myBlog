<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Validation\ContactValidator;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index() {
        return view('frontend.pages.contact');
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
        ]);

        return response()->json(['message' => 'Formunuz Başarıyla Gönderildi'], 200);
    }
}
