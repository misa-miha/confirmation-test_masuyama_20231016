<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'last_name' => ['required','string','max:255'],
            'first_name' => ['required','string','max:255'],
            'gender' => ['required'],
            'email' => ['required','string','email','max:255'],
            'zip11' => ['required','max:8','min:8'],
            'addr11' => ['required','string','max:255'],
            'content' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'last_name.required' => '※苗字を入力してください',
            'last_name.string' => '※苗字を文字列で入力してください',
            'last_name.max' => '※苗字を255文字以下で入力してください',
            'first_name.required' => '※名前を入力してください',
            'first_name.string' => '※名前を文字列で入力してください',
            'first_name.max' => '※名前を255文字以下で入力してください',
            'gender' => '※性別を選択してください',
            'email.required' => '※メールアドレスを入力してください',
            'email.string' => '※メールアドレスを文字列で入力してください',
            'email.email' => '※有効なメールアドレス形式を入力してください',
            'email.max' => '※メールアドレスを255文字以下で入力してください',
            'zip11.required' => '※郵便番号を入力してください',
            'zip11.max' => '※郵便番号を3桁、ハイフン、4桁で入力してください',
            'zip11.min' => '※郵便番号を3桁、ハイフン、4桁で入力してください',
            'addr11.required' =>'※住所を入力してください',
            'addr11.string' => '※住所を文字列で入力してください',
            'addr11.max' => '※住所を255文字以下で入力してください',
            'content.required' => '※ご意見を入力してください',
        ];
    }
}
