@extends('layouts.main')

@section('title', '新規登録画面')

@section('content')
    <h1>新規登録画面</h1>
    <form action="{{ route('customers.store') }}" method="post">
        @csrf
        <div>
            <label for="name">名前</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div>
            <label for="mail">メールアドレス</label>
            <input type="text" id="mail" name="mail" value="{{ old('mail') }}">
        </div>
        <div>
            <label for="zipcode">郵便番号</label>
            <input type="text" id="zipcode" name="zipcode" value={{ $results->results[0]->zipcode }}>
        </div>
        <div>
            <label for="address">住所</label>
            <textarea name="address" id="address" cols="30" rows="5">{{ $address }}</textarea>
        </div>
        <div>
            <label for="tel">電話番号</label>
            <input type="text" id="tel" name="tel" value="{{ old('tel') }}">
        </div>
        <div class="button-area">
            <button type="submit">登録</button>
            <button type="button" onclick="location.href='{{ route('customers.create') }}'">郵便番号検索に戻る</button>
        </div>
    </form>
@endsection 