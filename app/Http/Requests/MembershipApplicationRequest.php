<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MembershipApplicationRequest extends Request
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
            'lName' => 'required',
            'fName' => 'required',
            'mName' => 'required',
            'addr' => 'required',
            'bDay' => 'required|date',
            'religion' => 'required',
            'beneficiary' => 'required',
            'relToMem' => 'required'
        ];//dagdagbawas pa..
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'lName.required' => 'Last Name is required',
            'fName.required' => 'First Name is required',
            'mName.required' => 'Middle Name is required',
            'addr.required' => 'Address is required.',
            'bDay.required' => 'Birthday is required',
            'bDay.date' => 'Birthday should be a valid date.',
            'religion.required' => 'Religion is required.',
            'benefeciary.required' => 'Beneficiary is required.',
            'relToMem.required' => 'Relationship to member is required.'
        ];
    }
}
