<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
            'name'=>'min:5|max:10'
        ];
    }

    public function messages()
    {
        return [
            'name.min'=> 'Имя не может быть менее 5 символов',
            'name.max'=> 'Имя не может быть более 15 символов',
        ];
    }
}
