@extends('layouts.app');

@section('content')
<div class="text-center text-info mt-5">
    <p>システムエラーです。</p>
    <a href="{{ route('home') }}" class="btn btn-outline-info p-1">
        ホームへ戻る
    </a>
</div>
@endsection
