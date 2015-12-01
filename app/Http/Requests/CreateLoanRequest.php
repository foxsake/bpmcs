<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateLoanRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return \Auth::user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        //dd($this->member_id);
        return [
            'member_id' => 'required',
            'loan_id' => 'required|unique:accounts,loan_id,NULL,id,member_id,'.$this->member_id,
            'amount' => 'required|numeric',
            'terms' => 'required|numeric',
            'comaker' => 'required|max:255',
            'dateGranted' => 'required|date',
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