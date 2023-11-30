<?php

namespace App\Http\Requests\Validation;

use Illuminate\Foundation\Http\FormRequest;

class BlogValidator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'min: 5', 'max: 100', 'unique:blogs'],
            //'content' => ['required', 'max: 65000'],
            'image' => ['required', 'image', 'max:2048', /*'dimensions:min_width=100,min_height=100,max_width=500,max_height=500'*/],
        ];
    }

    public function messages(): array
    {
        return [
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
    }
}
