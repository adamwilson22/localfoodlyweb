<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CartRequest extends FormRequest
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
            "phone_number" => "required|numeric",
            "cardName" => "required|",
            "cardNumber" => "required|numeric",
            "cardCVC" => "required|numeric",
            "month" => "required|numeric",
            "year" => "required|numeric",
            "street_address" => "required|",
            "city" => "required|",
            "zipCode" => "required|",
            "country" => "required|",
        ];
    }
}
