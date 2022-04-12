<?php

namespace App\Http\Requests\category;

use Illuminate\Foundation\Http\FormRequest;


class CategoryUpdateRequest extends FormRequest
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
                'name' => 'required|max:100|unique:categories,name,'.request()->id,
              
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không được để trống',
            'name.unique' => 'Tên danh mục đã được sử dụng',
            'name.max' => 'Tên danh mục không được quá 100 ký tự'
        ];
    }
}
