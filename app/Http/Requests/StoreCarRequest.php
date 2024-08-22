<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'car_model'=>'required',
            'car_image'=>'required',
            'manufacturer'=>'required',
            'price'=>'required',
            'year'=>'required'
        ];
    }
    public function messages(): array
    {
        return [
            'car_model.required'=>'Bạn phải nhập car_model',
            'car_image.required'=>'Bạn phải nhập car_image',
            'manufacturer.required'=>'Bạn phải nhập manufacturer',
            'price.required'=>'Bạn phải nhập price',
            'year.required'=>'Bạn phải nhập year',
        ];
    }
}
