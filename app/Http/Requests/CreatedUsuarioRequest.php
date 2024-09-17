<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatedUsuarioRequest extends FormRequest
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
            "usuario" => "required",
            "password" => "required",
            "ruc" => "required",
        ];
    }
    //método para poder encriptar la contraseña 
    public function encryptPassword()
    {
        $validatedData = parent::validated();
        $validatedData['password'] = bcrypt($this->input('password'));
        return $validatedData;
    }
}
