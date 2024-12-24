<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SigninFormRequest extends FormRequest
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
            "username" => "required|string",
            "password" => "required|string",
        ];

    }

    protected function prepareForValidation()
    {
        $this->merge([
            "username" => strip_tags($this->username),
            "password" => strip_tags($this->password),
        ]);
    }


}
