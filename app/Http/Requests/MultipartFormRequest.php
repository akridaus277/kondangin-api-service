<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MultipartFormRequest extends FormRequest
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
            'id' => 'required',
            'nama' => 'required',
            'nama_panggilan' => 'required',
            'kelamin' => 'required',
            'file' => 'required|file|image|mimes:jpeg,png,jpg|max:1024',
            'nama_bapak' => 'required',
            'nama_ibu' => 'required'
        ];
    }
}
