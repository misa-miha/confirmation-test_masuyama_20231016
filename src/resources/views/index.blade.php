@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('script')
<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
@endsection

@section('content')

    <div class="contact-form__content">
        <div class="contact-form__heading">
            <h2>お問い合わせ</h2>
        </div>
        <form class="form" action="/contacts/confirm" method="post">
            @csrf
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お名前</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content--name">
                    <div class="form__input--text--last_name">
                        <input type="text" name="last_name" value="{{ old('last_name') }}" />
                        <p class="form__input--text--example">例) 山田</p>
                        <div class="form__error">
                            @error('last_name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form__input--text--first_name">
                        <input type="text" name="first_name" value="{{ old('first_name') }}" />
                        <p class="form__input--text--example">例) 太郎</p>
                        <div class="form__error">
                            @error('first_name')
                            {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">性別</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--radio">
                        <label for="gender1"><input type="radio" name="gender" id="gender1" value="1" {{ old('gender','1') == '1' ? 'checked' : '' }} checked="checked" >男性</label>
                        <label for="gender2"><input type="radio" name="gender" id="gender2" value="2" {{ old('gender') == '2' ? 'checked' : '' }} >女性</label>
                    </div>
                    <div class="form__error">
                        @error('gender')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">メールアドレス</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="email" name="email" value="{{ old('email') }}" />
                        <p class="form__input--text--example">例)test@example.com</p>
                    </div>
                    <div class="form__error">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">郵便番号</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <span class="form__input--item">〒</span>
                        <input type="text" name="zip11" value="{{ old('zip11') }}" size="10" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','addr11','addr11');">
                        <p class="form__input--text--example">例) 123-4567
                        </p>
                    </div>
                    <div class="form__error">
                        @error('zip11')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">住所</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="addr11" value="{{ old('addr11') }}" size="60">
                        <p class="form__input--text--example">例) 東京都渋谷区千駄ヶ谷1-2-3
                        </p>
                    </div>
                    <div class="form__error">
                        @error('addr11')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">建物名</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" name="address2" value="{{ old('address2') }}" />
                        <p class="form__input--text--example">例) 千駄ヶ谷マンション101
                        </p>
                    </div>
                    <div class="form__error">
                        @error('address2')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">ご意見</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--textarea">
                        <textarea name="content" >{{ old('content') }}</textarea>
                    </div>
                    <div class="form__error">
                        @error('content')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">確認</button>
            </div>
        </form>
    </div>
@endsection