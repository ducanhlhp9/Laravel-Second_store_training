<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestCategory extends FormRequest
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
            'Name' => 'required|unique:category,c_name,'.$this->id,
            'icon' => 'required'
        ];
    }
    //Đưa ra thông báo lỗi để trống
    public function messages()
    {
        return [
            'Name.required' => 'Trường này không được để trống!!',
            'Name.unique'   =>  'Danh mục này đã tồn tại!!',
            'icon.required' => 'Trường này không được để trống!!'
        ];
    }
}
