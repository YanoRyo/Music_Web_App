<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactForm extends FormRequest
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
            //
            'user_name' => 'required|string|max:20',
            'email' => 'required|email|unique:users|max:100',
            'address' => 'required|string|max:10',
            'user_field' => 'required|string|max:10',
            'favorite_genre' => 'required|string|max:100',
            'user_image' => 'required|string|max:255',
            'password' => 'required|string|max:255',
            
        ];
    }
}
