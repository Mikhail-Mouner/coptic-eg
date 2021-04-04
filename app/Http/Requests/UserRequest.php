<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        switch($this->method()){
            case 'GET':
            case 'DELETE':
            {
                return [];
            }
            case 'POST':
            {
                return [
                    'name' => 'required|string|min:3|max:191',
                    'email' => 'required|email|unique:users,email|max:191',
                    'password' => 'required|string|min:6|max:191',
                    'photo' => 'image',
                    'role' => 'in:admin,user',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'name' => 'required|string|min:3|max:191',
                    'email' => 'required|email|unique:users,email'.$this->id.'|max:191',
                    'password' => 'required|string|min:6|max:191',
                    'photo' => 'image',
                    'role' => 'in:admin,user',
                ];
            }
            default:break;
        }
    }
}
