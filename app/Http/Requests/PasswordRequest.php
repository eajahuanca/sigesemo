<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'password_old' => ['required','current_password'],
            'password' => ['required','min:6'],
            'password_confirm' => ['required','same:password'],
        ];
    }

    public function attributes(){
        return [
            'password_old' => 'Contraseña antigua',
            'password' => 'Contraseña Nueva',
            'password_confirm' => 'Confirmar Contraseña'
        ];
    }

    public function messages(){
        return [
            'password_old.current_password' => 'La Contraseña antigua no coincide',
            'password_confirm.same' => 'La Contraseña nueva no coincide',
            'password_old.required' => 'La Contraseña antigua es requerida',
            'password.required' => 'La Contraseña nueva es requerida',
            'password_confirm.required' => 'La Contraseña es requerida',
            'password.min' => 'La Contraseña nueva debe contener 6 caracteres como minimo'
        ];
    }

    public function sanitize()
    {
        return $this->only('password');
    }
}
