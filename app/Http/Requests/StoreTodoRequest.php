<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// not sure which extension to use intstead of FormRequest
class StoreTodoRequest extends FormRequest
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
            'title' => 'required|string',
            'completed' => 'required|boolean'
        ];
    }
}
