<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Auth;

class LoanApplicationRequest extends Request
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
        //dd(Auth::user()->member->id);
        return [
            'loan_id' => 'required|unique:accounts,loan_id,NULL,id,member_id,'.Auth::user()->member->id,
            'amount' => 'required|numeric',
            'terms' => 'required|numeric',
            'comaker' => 'required|max:255'
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
            'comaker.required' => 'Co-Maker is required',
        ];
    }
}
