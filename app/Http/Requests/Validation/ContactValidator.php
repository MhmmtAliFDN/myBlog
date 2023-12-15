<?php

namespace App\Http\Requests\Validation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min: 5', 'max: 50'],
            'phone' => ['required', 'min:18'],
            'email' => ['required', 'email:rfc,dns', 'max: 50'],
            'title' => ['required', 'max: 100'],
            'content' => ['required', 'max: 500'],
        ];
    }

    public function messages(): array
    {
        return [
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
    }
}
