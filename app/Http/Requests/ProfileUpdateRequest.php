<?php

namespace App\Http\Requests;

use App\Enums\GenderType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
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
            'nickname' => 'required|max:15',
            'content' => 'required|max:200|',
            'icon' => 'max:1024|mimes:jpg,jpeg,png,gif',
            'prefecture' => ['required','numeric',Rule::in(array_keys(config('pref')))],
            'gender'=> ['required','numeric',Rule::in(GenderType::getValues())],
            'age' => 'required|numeric|min:10|max:80'
        ];
    }

    /**
     *  バリデーション項目名定義
     * @return array
     */
    public function attributes()
    {
        return [
            'nickname' => 'ニックネーム',
            'content' => '自己紹介',
            'icon' => 'アイコン画像',
            'prefecture' => '都道府県',
            'gender'=> '性別',
            'age' => '年齢'
        ];
    }
}
