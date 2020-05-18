<?php

namespace App\Http\Requests\BackEnd\videos;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'desc' => ['required', 'min:10'],
            'meta_keywords' => ['max:255'],
            'meta_desc' => ['max:255'],
            'youtube' => ['required', 'url'],
            'published' => ['boolean'],
            'cat_id' => ['integer', 'required'],
            'image' => ['required']
        ];
    }
}
