<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class AuthRequest extends FormRequest
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
            'name' => 'Required|min:3|max:50',
            'email' => 
            [   
                'Required','email',
                Rule::unique('users','email')->ignore($this->admin_id),
            ],
            'password' => 'Required|min:8|Present',
            'password_confirmation' => 'required|min:8|same:password',
        ];
        // $messages = [
        //     'password_confirmation.same' => 'The password confirmation does not match.',
        // ];
        // $validator = Validator::make($input, $rules, $messages);
        
        // if ($validator->fails()) {
        //     return back()->withInput()->withErrors($validator->messages());
        // }
    }
}
// bail => exclude_if:email,false