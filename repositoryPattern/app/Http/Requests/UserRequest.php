<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
use Log;
use DB;


class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected function failedValidation(Validator $validator)
    {
        $data = [
            'status_code' => 422,
            'success' => 'false'
        ];
        // $data['validation_errors'] = $validator->errors();
        // throw (new HttpResponseException(response()->json([$data, 422])));       // Two line API Validation in Used

        return redirect()->back()->withErrors($validator);       // WebRoutes use validation is used
    }

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
        Log::info("In RULES");
        return [
            'name' => 'required',
            'email'=> 'required'
        ];
    }

    public function messages()
    {
        Log::info("In MESSAGE");
        return [
            'name.required' => 'User Name is Required',
            'email.required' => 'Email Address is Required',
        ];

    }
}
