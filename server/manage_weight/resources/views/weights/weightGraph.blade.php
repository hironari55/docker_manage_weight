@extends('layouts.graph')

@section('title', 'weight_graph')

@section('content')
<div class="d-flex">
    <div class="dropdown">
        <a class="btn btn-outline-info dropdown-toggle p-1" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            グラフデータ選択
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="{{ route('weights.weightGraph', ['dataType' => 'bodyWeight', 'period' => $period]) }}">体重</a>
            <a class="dropdown-item" href="{{ route('weights.weightGraph', ['dataType' => 'fatPercentage', 'period' => $period]) }}">体脂肪率</a>
            <a class="dropdown-item" href="{{ route('weights.weightGraph', ['dataType' => 'muscleWeight', 'period' => $period]) }}">筋肉量</a>
            <a class="dropdown-item" href="{{ route('weights.weightGraph', ['dataType' => 'fatWeight', 'period' => $period]) }}">脂肪量</a>
            <a class="dropdown-item" href="{{ route('weights.weightGraph', ['dataType' => 'calorieIntake', 'period' => $period]) }}">摂取カロリー</a>
        </div>
    </div>
    <div class="dropdown mx-2">
        <a class="btn btn-outline-info dropdown-toggle p-1" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            期間選択
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" href="{{ route('weights.weightGraph', ['dataType' => $dataType, 'period' => 'week']) }}">週間</a>
            <a class="dropdown-item" href="{{ route('weights.weightGraph', ['dataType' => $dataType, 'period' => 'month']) }}">月間</a>
            <a class="dropdown-item" href="{{ route('weights.weightGraph', ['dataType' => $dataType, 'period' => 'threeMonth']) }}">3ヶ月</a>
            <a class="dropdown-item" href="{{ route('weights.weightGraph', ['dataType' => $dataType, 'period' => 'halfYear']) }}">半年</a>
            <a class="dropdown-item" href="{{ route('weights.weightGraph', ['dataType' => $dataType, 'period' => 'oneYear']) }}">年間</a>
        </div>
    </div>
</div>

<canvas id="weights" class="w-100 mt-4"></canvas>
@endsection
