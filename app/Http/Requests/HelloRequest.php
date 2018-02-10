<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HelloRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // URLがvalidationのときだけ起動するような設定
        if ($this->path() == 'validation')
        {
            return true;
        }
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'mail' => 'email',
            'age' => 'numeric|hello',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名前は必ず入力してください',
            'mail.email' => 'メールアドレスが正しくありません',
            'age.numeric' => '年齢は整数で入力してください',
            'age.hello' => '偶数だけ入力できます',
        ];
    }
}
