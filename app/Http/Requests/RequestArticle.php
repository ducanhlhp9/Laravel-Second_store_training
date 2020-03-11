<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RequestArticle extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'a_name' => 'required|unique:articles,'.$this->id,
            'a_description' => 'required',
            'a_content'     =>  'required'
        ];
    }
    //Đưa ra thông báo lỗi để trống
    public function messages()
    {
        return [
            'a_name.required' => 'Trường này không được để trống!!',
            'a_name.unique'   =>  'Tên bài viết này đã tồn tại!!',
            'a_description.required' => 'Trường này không được để trống!!',
            'a_content.required' => 'Trường này không được để trống!!'

        ];
    }
}
