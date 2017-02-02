<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JualRequest extends FormRequest
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
            'title'       => 'required|min:3|max:255',
            'hargaNormal' => 'required|min:4',
            'diskon'      => 'required|min:4',
            'tag_id'      => 'required',
            'deskripsi'   => 'required|min:3|max:2000',
            'img[]'       => 'image:jpeg|max:2500',
        ];
    }
}
