<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnecdotaUpdateRequest extends FormRequest
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
        $rules = [
            'name'          => 'required',
            'slug'          => 'required|unique:anecdotas,slug,' . $this->anecdota,
            'user_id'       => 'required|integer',
            'body'          => 'required',
            'status'        => 'required|in:DRAFT,PUBLISHED',
        ];

        if($this->get('image'))        
            $rules = array_merge($rules, ['image'         => 'mimes:jpg,jpeg,png']);

        return $rules;
    }
}
