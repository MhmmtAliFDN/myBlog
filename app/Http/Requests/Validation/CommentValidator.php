<?php

namespace App\Http\Requests\Validation;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CommentValidator extends FormRequest
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
            'content' => ['required', 'max: 500'],
        ];
    }

    public function messages(): array
    {
        return [
            'content.required' => 'Yorum alanını boş olamaz.',
            'content.max' => 'Lütfen yorumu 500 karakterden kısa yazınız.',
        ];
    }
}
