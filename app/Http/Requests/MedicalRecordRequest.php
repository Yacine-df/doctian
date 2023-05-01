<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MedicalRecordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user() ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'gender' => ['required','string', Rule::in(['man','woman'],'Invalid gender value')],
            'date_of_birth' => ['required','date:Y-m-d'],
            'height'  => ['required','digits_between:2,3'],
            'weight'  => ['required','digits_between:2,3']
        ];
    }
}
