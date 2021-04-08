<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class OwnerRequest extends FormRequest
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
        // these are a list of rules that have to be met when entering new owners. This is linked to the api controller using the USE.
        return [
            "first_name" => ["required", "string"],
            "last_name" => ["required", "string"],
            "telephone" => ["required", "string"],
            "address_1" => ["required", "string"],
            "town"=> ["required", "string"], 
            "postcode"=> ["required", "string"],
        ];
    }
}
