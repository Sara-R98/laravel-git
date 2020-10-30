<?php

namespace App\Http\Requests;

use App\Rules\Uppercase;
use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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
            // 'title'=>['required','min:2',new Uppercase()],
            'title'=>['required','min:2'],
            'body'=>'required' ,
            'file'=>['required' , 'max:1000' , 'mimes:jpeg,png,jpg']
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'لطفا عنوان مطلب موردنظر خود را وارد کنید' ,
            'title.min'=>'تعداد کاراکترهای عنوان شما باید بیشتر از 2 کاراکتر باشد',
            'body.required'=>'لطفا توضیحات مطلب موردنظر خودرا واردکنید' ,
            'file.required'=>'لطفا تصویر این مطلب را مشخص کنید' ,
            'file.max'=>'حجم تصویر نباید بیش از 1 مگ باشد' ,
            'file.mimes'=>'نوع تصویر مطلب شما باید jpeg یا jpg ویا png باشد'
        ];
    }
}
