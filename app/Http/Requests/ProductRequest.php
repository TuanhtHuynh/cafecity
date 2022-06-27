<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
        $productId = $this->route()
            ->parameter( 'id' );
        $rules = [
            'name'        => 'required|min:5',
            'price'       => 'required|integer|min:10000',
            'quantily'    => 'required|integer|min:1',
            'category_id' => 'required',
        ];
        if ( $this->method() == 'POST' ) {

            $rules['name'] = ['required', 'min:5', 'unique:products,name' . $productId];
            // Rule::unique( 'products', 'name' )->ignore( $productId )];
        }
        return $rules;
    }

    public function messages()
    {
        return [
            'name.required'     => 'Vui lòng điền thông tin',
            'name.min'          => 'Ít nhất 5 kí tự',
            'price.required'    => 'Vui lòng điền thông tin',
            'price.min'         => 'Ít nhất 10000vnd',
            'quantily.required' => 'Ít nhất 1',

        ];
    }
}
