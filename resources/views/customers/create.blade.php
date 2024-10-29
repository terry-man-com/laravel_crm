@extends('layouts.main')

@section('title', '郵便番号検索')

@section('content')
    <h1>郵便番号検索画面</h1>
    <form action="{{ route('customers.search') }}" method="get">
    <div>
        <label for="zipcode">郵便番号検索</label>
        <input type="text" id="zipcode" name="zipcode" value="{{ old('zipcode') }}" placeholder="検索したい郵便番号">
        <input type="submit" value="検索">
    </div>
    <div>
        <button type="button" onclick="location.href='{{ route('customers.index') }}'">一覧に戻る</button>
    </div>
    </form>
@endsection