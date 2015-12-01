<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LoanApprovalRequest extends Request
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
        return [
            'particular' => 'required',
            'reference' => 'required',
        ];
    }
}
