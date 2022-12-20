<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\ProductSelling;
use App\Enums\ProductState;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Validation\Rule;

class ProductUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:20',
            'content' => 'required|max:300',
            'image1' => 'max:1024|mimes:jpg,jpeg,png,gif',
            'image2' => 'nullable|max:1024|mimes:jpg,jpeg,png,gif',
            'image3' => 'nullable|max:1024|mimes:jpg,jpeg,png,gif',
            'image4'=> 'nullable|max:1024|mimes:jpg,jpeg,png,gif',
            'price' => 'required|numeric|min:300|max:99999',
            'state' => ['required',Rule::in(ProductState::getValues())],
            'is_selling' =>  ['required', Rule::in(ProductSelling::getValues())],
        ];
    }

    /**
     *  バリデーション項目名定義
     * @return array
     */
    public function attributes()
    {
        return [
            'name' => '商品名',
            'content' => '商品内容',
            'image1' => '画像(1枚目)',
            'image2' => '画像(2枚目)',
            'image3' => '画像(3枚目)',
            'image4'=> '画像(4枚目)',
            'state' => '商品の状態',
            'price' => '料金',
            'is_selling' =>  '販売状態'
        ];
    }
}

