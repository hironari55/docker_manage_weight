@extends('layouts.graph')

@section('title','weight_one_year_graph')

@section('content')
<div class="dropdown">
    <a class="btn btn-outline-info dropdown-toggle p-1" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        グラフデータ選択
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a class="dropdown-item" href="{{ route('weights.oneYearGraph', ['id' => 1]) }}">体重</a>
        <a class="dropdown-item" href="{{ route('weights.oneYearGraph', ['id' => 2]) }}">体脂肪率</a>
        <a class="dropdown-item" href="{{ route('weights.oneYearGraph', ['id' => 3]) }}">筋肉量</a>
        <a class="dropdown-item" href="{{ route('weights.oneYearGraph', ['id' => 4]) }}">脂肪量</a>
        <a class="dropdown-item" href="{{ route('weights.oneYearGraph', ['id' => 5]) }}">摂取カロリー</a>
    </div>
</div>

@endsection
