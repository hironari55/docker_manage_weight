@extends('layouts.app')

@section('title', 'manual')

@section('content')
<div class="card border-info mt-3 shadow-sm">
    <div class="card-header bg-transparent border-info text-info d-flex justify-content-between align-items-center">
        アプリ使い方
    </div>

    <div class="card-body text-info">
        <ul>
            <li><a href="{{ route('weights.manualHome') }}">ホーム画面</a></li>
            <li><a href="{{ route('weights.manualWeightGraph') }}">記録折れ線グラフ</a></li>
            <li><a href="{{ route('weights.manualWeightList') }}">記録リスト</a></li>
        </ul>
    </div>
</div>

@endsection
