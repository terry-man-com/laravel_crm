@extends('layouts.main')

@section('title', '編集画面')

@section('content')
    <h1>編集画面</h1>
    @if ($errors->any())
        <div class="error">
            <p>
                <b>{{ count($errors) }}件のエラーがあります。</b>
            </p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('customers.update', $customer) }}" method="post">
        @csrf
        @method('PUT')
        <div>
            <label for="name">名前</label>
            <input type="text" id="name" name="name" value="{{ old('name', $customer->name) }}">
        </div>
        <div>
            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="mail" value="{{ old('mail', $customer->mail) }}">
        </div>
        <div>
            <label for="zipcode">郵便番号</label>
            <input type="text" id="zipcode" name="zipcode" value="{{ old('zipcode', $customer->zipcode) }}">
        </div>
        <div>
            <label for="address">住所</label>
            <textarea name="address" id="address" cols="30" rows="5">{{ old('address', $customer->address) }}</textarea>
        </div>
        <div>
            <label for="tel">電話番号</label>
            <input type="text" id="tel" name="tel" value="{{ old('tel', $customer->tel) }}">
        </div>
        <div class="button-area">
            <button type="submit">更新</button>
            <button type="button" onclick="location.href='{{ route('customers.index') }}'">戻る</button>
        </div>
    </form>
@endsection