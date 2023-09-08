<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => ['string', 'max:255'],
            'email' => ['email', 'max:255', Rule::unique(User::class)->ignore($this->user()->id)],
            'apellidos' => ['string', 'max:255'],
            'direccion' => ['string', 'max:255'],
            'cp' => 'required',
            'ciudad' => ['string', 'max:255'],
            'provincia' => ['string', 'max:255'],
            'telefono' => ['string', 'max:25'],
            'fecha_nacimiento' => 'required'
            
            //TODO poner cuidador
        ];
    }
}
