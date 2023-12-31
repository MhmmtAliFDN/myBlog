<?php

namespace App\Http\Requests\Validation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogValidator extends FormRequest
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
    public function rules($blog=null): array
    {
        if ($blog==null) {
            return [
                'name' => ['required', 'min: 5', 'max: 100', 'unique:blogs'],
                'summary' => ['required', 'max: 255'],
                'content' => ['required'],
                'image' => ['required', 'image', 'max:2048', /*'dimensions:min_width=100,min_height=100,max_width=500,max_height=500'*/],
            ];
        } else {
            return [
                'name' => ['required', 'min: 5', 'max: 100', Rule::unique('blogs')->ignore($blog->id)],
                'summary' => ['required', 'max: 255'],
                'content' => ['required'],
                'image' => ['image', 'max:2048',  /*'dimensions:min_width=100,min_height=100,max_width=500,max_height=500'*/],
            ];
        }
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Blogunuzun ismi boş olamaz.',
            'name.min' => 'Blogunuzun ismi 5 karakterden kısa olamaz.',
            'name.max' => 'Blogunuzun ismi 100 karakterden uzun olamaz.',
            'name.unique' => 'Aynı isimde başka bir blog olamaz.',

            'summary.required' => 'Özet alanı boş olamaz.',
            'summary.max' => 'Özetimiz 255 karakterden uzun olamaz.',

            'content.required' => 'İçerik alanı boş olamaz.',

            'image.required' => 'Lütfen bir resim ekleyiniz.',
            'image.image' => 'Dosya resim formatında olmalıdır.',
            'image.max' => 'Dosya boyutu en fazla 2 MB(megabyte) olabilir.',
        ];
    }
}
