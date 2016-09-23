<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSDRequest extends FormRequest
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
            
            'info'=> 'required',
            'start_on'=> 'required',
        ];
    }

    public function messages(){
        return [
            'info.required'=>'bạn chưa nhập nơi ở hiện tại',
            'start_on'=> 'bạn chưa nhập ngày bắt đầu ở';
        ];
    }
}
