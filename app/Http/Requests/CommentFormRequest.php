<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentFormRequest extends FormRequest
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
            //
            "user_id" => ["required","integer"],
            "blog_id" => ["required","integer"],
            "message" => ["required","string"],

        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            "user_id" => strip_tags($this->user_id),
            "blog_id" => strip_tags($this->blog_id),
            "message" => strip_tags($this->message),
        ]);

    }

}
