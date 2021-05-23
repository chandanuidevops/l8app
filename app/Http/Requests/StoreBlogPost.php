<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
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
            'title'=>'alpha|required|between:2,4',
            // 'content'=>'required',
            // 'check'=>'required',
           'photo'=>'max:500',
            // 'start_date'=>'required|after:tomorrow',
            // 'finish_date'=>'required|after:start_date',
            // 'tos'=>'accepted',
            // 'website'=>'active_url',
            'password_confirmation'=>'confirmed'
        ];
    }
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            // 'title.required' => 'A title is required',
            // 'content.required' => 'A content field is required',
        ];
    }
    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
           // 'photo' => 'profile  image',
            //'check' => 'study',
        ];
    }
}
