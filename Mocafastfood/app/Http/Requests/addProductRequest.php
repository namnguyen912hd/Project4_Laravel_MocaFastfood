<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addProductRequest extends FormRequest
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
            'name' => 'bail|required|unique:products',
            'price' => 'required',
            'categoryID' =>'required',
            'contentPro' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Warn: Tên không được để trống',
            'name.unique' => 'Warn: Tên không được trùng nhau',
            'price.required' => 'Warn: Giá không được để trống',
            'categoryID.required' => 'Warn: Tên không được để trống',
            'contentPro.required' => 'Warn: Giá không được để trống'
        ];
    }

}
