@extends('layouts.main')

@section('title', '顧客詳細画面')

@section('content')
    <h1>顧客詳細画面</h1>

    <table class="table">
        <tr>
            <th>顧客ID</th>
            <th>名前</th>
            <th>メールアドレス</th>
            <th>郵便番号</th>
            <th>住所</th>
            <th>電話番号</th>
        </tr>
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->mail }}</td>
                    <td>{{ $customer->zipcode }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->tel }}</td>
                </tr>
    </table>
    <button type="button" onclick="location.href='{{ route('customers.edit', $customer) }}'">編集画面</button>
    <form action="{{ route('customers.destroy', $customer) }}" method="post">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="if(!confirm('削除しますか？')){return false};">削除する</button>
    </form>
    <button type="button" onclick="location.href='{{ route('customers.index') }}'">一覧に戻る</button>
@endsection