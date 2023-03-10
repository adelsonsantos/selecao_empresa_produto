<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBairroRequest extends FormRequest
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
            "estado" => "required|min:2|max:2",
            "cidade" => "required",
            "bairro" => "required",
            "latitude" => "required|numeric",
            "longitude" => "required|numeric"
        ];
    }
}
