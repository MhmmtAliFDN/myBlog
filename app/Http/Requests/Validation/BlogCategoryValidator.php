<?php

namespace App\Http\Requests\Validation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogCategoryValidator extends FormRequest
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
    public function rules($blogCategory=null): array
    {
        if ($blogCategory==null) {
            return [
                'name' => ['required', 'min: 3', 'max: 50', 'unique:blog_categories'],
            ];
        } else {
            return [
                'name' => ['required', 'min: 3', 'max: 50', Rule::unique('blog_categories')->ignore($blogCategory->id)],
            ];
        }
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Kategori ismi boş olamaz.',
            'name.min' => 'Kategori ismi 3 karakterden kısa olamaz.',
            'name.max' => 'Kategori ismi 50 karakterden uzun olamaz.',
            'name.unique' => 'Aynı isimde başka bir kategori olamaz.',
        ];
    }
}
