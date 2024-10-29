@extends('layouts.main')

@section('title', '顧客一覧')

@section('content')
    <h1>顧客一覧</h1>

    <table class="table">
        <tr>
            <th>顧客ID</th>
            <th>名前</th>
            <th>メールアドレス</th>
            <th>郵便番号</th>
            <th>住所</th>
            <th>電話番号</th>
        </tr>
        @if (!empty($customers))
            @foreach ($customers as $customer)
                <tr>
                    <td><a href="{{ route('customers.show', $customer) }}">{{ $customer->id }}</a></td>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->mail }}</td>
                    <td>{{ $customer->zipcode }}</td>
                    <td>{{ $customer->address }}</td>
                    <td>{{ $customer->tel }}</td>
                </tr>
            @endforeach
        @endif
    </table>
    <button type="button" onclick="location.href='{{ route('customers.create') }}'">新規作成</button>
@endsection