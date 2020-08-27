<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacancyRequest extends FormRequest
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
            'name' => 'required|min:8',
            'description' => 'required|min:8',
            'slug' => '',
            'category_id' => 'required',
            'experience_id' => 'required',
            'location_id' => 'required',
            'salary_id' => 'required',
            'skills' => 'required',
        ];
    }
}

