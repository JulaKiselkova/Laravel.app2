<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBrandRequest extends FormRequest
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
            'name' => 'email|min:8'
        ];
    }

    public function messages() {
        return [
            'name.min:8' => "Имя должно быть больше 8 символов",
            'name.email' => "Нужен мэил"
        ];
    }
}
