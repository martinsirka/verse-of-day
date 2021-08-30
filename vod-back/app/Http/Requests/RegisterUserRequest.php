<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // All are authorized
        //return false; // Non is authorized
        // return auth()->check(); Check if user is logged in
        // return auth()->user()->columnFromDB() create authorization by your need 
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'      => 'required|min:6',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6|confirmed',
        ];
    }
}
