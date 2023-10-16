<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Management system</title>
    <link rel="stylesheet" href="{{ asset('css/find.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <script>
    var elements = document.querySelectorAll('.truncate-text');

    elements.forEach(function(element) {
        var fullText = element.getAttribute('data-full-text');
        var truncatedText = Str::limit(fullText, 50, '...');

        element.textContent = truncatedText;

        element.addEventListener('mouseenter', function() {
            element.textContent = fullText;
        });

        element.addEventListener('mouseleave', function() {
            element.textContent = truncatedText;
        });
    });
    </script>
</head>

<style>
svg.w-5.h-5 {
    width: 30px;
    height: 30px;
    }
</style>

<body>
    <div class="search__content">
        <div class="search__heading">
            <h2>管理システム</h2>
        </div>
        <form class="search-form" action="/search/result" method="get">
            @csrf
            <div class="search-form--inner">
                <div class="form__group--unit">
                    <div class="form__group-name">
                        <div class="form__group-title">
                            <span class="form__label--item">お名前</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--text">
                                <input type="text" name="name" value="{{ old('name') }}" />
                            </div>
                        </div>
                    </div>
                    <div class="form__group-gender">
                        <div class="form__group-title">
                            <span class="form__label--item">性別</span>
                        </div>
                        <div class="form__group-content">
                            <div class="form__input--radio">
                                <label for="gender0"><input type="radio" name="gender" id="gender1" value="1" {{ old('gender','0') == '0' ? 'checked' : '' }} checked="checked" >全て</label>
                                <label for="gender1"><input type="radio" name="gender" id="gender1" value="1" {{ old('gender') == '1' ? 'checked' : '' }} >男性</label>
                                <label for="gender2"><input type="radio" name="gender" id="gender2" value="2" {{ old('gender') == '2' ? 'checked' : '' }} >女性</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form__group-date">
                    <div class="form__group-title">
                        <span class="form__label--item">登録日</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--date">
                            <input type="date" name="from_date" value="{{ old('from_date') }}">
                            <span>~</span>
                            <input type="date" name="to_date"  value="{{ old('to_date') }}">
                        </div>
                    </div>
                </div>
                <div class="form__group-email">
                    <div class="form__group-title">
                        <span class="form__label--item">メールアドレス</span>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="email" value="{{ old('email') }}" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="search-form__button">
                <button class="search-form__button-submit" type="submit">検索</button>
                <a class="search-form__button-reset" href="/">リセット</a>
            </div>
        </form>

        {{ $contacts->links() }}

        <div class="search-table">
            <table class="search-table__inner">
                <tr class="search-table__row">
                    <th class="search-table__header">ID</th>
                    <th class="search-table__header">お名前</th>
                    <th class="search-table__header">性別</th>
                    <th class="search-table__header">メールアドレス</th>
                    <th class="search-table__header">ご意見</th>
                </tr>
                @foreach ($contacts as $contact)
                <tr class="search-table__row">
                    <td class="search-table__item">{{$contact->id}}</td>
                    <td class="search-table__item">
                        {{$contact->last_name . ' ' . $contact->first_name}}</td>
                    <td class="search-table__item">
                        @if ($contact->gender == 1)
                        <p>男性</p>
                        @elseif ($contact->gender == 2)
                        <p>女性</p>
                        @endif
                    </td>
                    <td class="search-table__item">{{$contact->email}}</td>
                    <td class="search-table__item">
                        <p class="truncate-text" data-full-text="{{ $contact->content }}">{{ Str::limit($contact->content, $limit = 50, $end = '...') }}</p>
                    </td>
                    <td class="search-table__item">
                        <form class="delete-form" action="/contacts/delete?id={{$contact->id}}" method="post">
                            @method('DELETE')
                            @csrf
                            <div class="delete-form__button">
                                <input type="hidden" name="id" value="{{ $contact['id'] }}">
                                <button class="delete-form__button-submit" type="submit">削除</button>
                            </div>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>