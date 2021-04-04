<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
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
                    'title' => 'required|string|unique:courses,title|min:3|max:191',
                    'brief' => 'string|max:191',
                    'duration' => 'string',
                    'location' => 'string',
                    'main_photo' => 'image',
                    'online' => 'boolean',
                    'category' => 'required|exists:App\Models\Category,id',
                    'level' => 'exists:App\Models\Level,id',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'title' => 'required|string|unique:courses,title,'.$this->id.'|min:3|max:191',
                    'brief' => 'string|max:191',
                    'duration' => 'string',
                    'location' => 'string',
                    'main_photo' => 'image',
                    'online' => 'boolean',
                    'category' => 'required|exists:App\Models\Category,id',
                    'level' => 'exists:App\Models\Level,id',
                ];
            }
            default:break;
        }
    }
}
