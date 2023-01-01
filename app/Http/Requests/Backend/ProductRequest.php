<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
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
            'name' => [
                'required',
                'string'
            ],
            'slug' => [
                'required',
                'string'
            ],

            'category_id' => [
                'required',
                'integer'
            ],



            'brand' => [
                'required',
                'string'
            ],

            'description' => [
                'required',

            ],
            'small_description' => [
                'required',

            ],


            // 'image'=>[
            // 'nullable',
            // 'mimes:jpg,png,jpeg'
            // ],

            'meta_title' => [
                'required',
                'string'
            ],
            'original_price' => [
                'required',

            ],
            'selling_price' => [
                'required',

            ],
            'quantity' => [
                'required',
                'integer'
            ],
            'status' => [
                'nullable',

            ],
            'trending' => [
                'nullable',

            ],

            'meta_keyword' => [
                'required',
                'string'
            ],
            'meta_description' => [
                'required',
                'string'
            ],
        ];
       
    }
}
