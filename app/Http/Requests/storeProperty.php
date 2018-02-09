<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storeProperty extends FormRequest
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
            'images.*'    => 'bail|nullable|image',
            'caption'     => 'bail|required|alpha_num_spaces|max:255',
            'location'    => 'bail|required|string|max:255',
            'coordinates' => 'bail|nullable|coordinates',
            'type'        => 'bail|required|types',
            'price'       => 'bail|required|numeric',
            'beds'        => 'bail|required|numeric|max:255',
            'bath'        => 'bail|required|numeric|max:255',
            'sqft'        => 'bail|required|numeric|digits_between:1,9',
            'sqftPrice'   => 'bail|required|numeric|digits_between:1,9',
            'built'       => 'bail|required|date',
        ];
    }
}
