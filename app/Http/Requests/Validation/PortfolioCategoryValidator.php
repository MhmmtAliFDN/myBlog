<?php

namespace App\Http\Requests\Validation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PortfolioCategoryValidator extends FormRequest
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
    public function rules($portfolioCategory=null): array
    {
        if ($portfolioCategory==null) {
            return [
                'name' => ['required', 'min: 3', 'max: 50', 'unique:portfolio_categories'],
            ];
        } else {
            return [
                'name' => ['required', 'min: 3', 'max: 50', Rule::unique('portfolio_categories')->ignore($portfolioCategory->id)],
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
