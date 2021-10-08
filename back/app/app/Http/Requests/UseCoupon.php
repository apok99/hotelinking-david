<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UseCoupon extends FormRequest
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

    protected $redirect = '/404';
      

    public function messages(){
        return [
            'id.required' => 'A ID is required',
        ];
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            // 'name' => 'required|Unique:\App\Models\Coupon,code'
            'id' => 'required|Exists:\App\Models\Coupon,id'
        ];
    }
}
