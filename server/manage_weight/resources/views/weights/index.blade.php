@extends('layouts.app')

@section('title', 'edit_weight')

@section('content')
<div class="container">
    <div class="card border-info shadow-sm mt-3">
        <div class="card-header bg-transparent border-info text-info d-flex justify-content-between align-items-center p-2">
            @if(!empty($previousDayWeight))
            <a href="{{ route('weights.index',['weight' => $previousDayWeight->id]) }}" class="text-align-center"><i class="fas fa-angle-left fa-2x"></i></a>
            @else
            <div class="text-secondary"><i class="fas fa-angle-left fa-2x"></i></div>
            @endif
            <div class="text-center">
                <h5>日付</h5>
                <h4 class="mb-0">{{$weight->date}}</h4>
            </div>
            @if(!empty($nextDayWeight))
            <a href="{{ route('weights.index',['weight' => $nextDayWeight->id]) }}"><i class="fas fa-angle-right fa-2x"></i></a>
            @else
            <div class="text-secondary"><i class="fas fa-angle-right fa-2x"></i></div>
            @endif
        </div>
        <div class="card-body text-info p-2">
            <div class="row d-flex justify-content-center">
                <div class="card border-info col-5 mx-2 my-2">
                    <div class="card-body p-0 py-2 text-center">
                        <h5 class="card-title border-bottom">筋肉量</h5>
                        <p class="card-text">{{$weight->muscle_weight}}kg</p>
                    </div>
                </div>
                <div class="card border-info col-5 mx-2 my-2">
                    <div class="card-body p-0 py-2 text-center">
                        <h5 class="card-title border-bottom">体脂肪率</h5>
                        <p class="card-text">{{$weight->fat_percentage}}%</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="card border-info col-6 my-2">
                    <div class="card-body p-0 py-2 text-center">
                        <h5 class="card-title border-bottom">体重</h5>
                        <p class="card-text">{{$weight->weight}}kg</p>
                    </div>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="card border-info col-5 mx-2 my-2">
                    <div class="card-body p-0 py-2 text-center">
                        <h5 class="card-title border-bottom">摂取<br>カロリー</h5>
                        <p class="card-text">{{$weight->calorie_intake}}kcal</p>
                    </div>
                </div>
                <div class="card border-info col-5 mx-2 my-2">
                    <div class="card-body p-0 py-2 text-center">
                        <h5 class="card-title border-bottom">脂肪量</h5>
                        <p class="card-text">{{$weight->fat_weight}}kg</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer bg-transparent border-info p-2">
            <a href="{{ route('weights.edit',['weight' => $weight->id]) }}" class="btn btn-outline-info w-100">編集</a>
        </div>
        <div class="card-footer bg-transparent border-info p-2">
            <a href="{{ route('weights.create') }}" class="btn btn-outline-info w-100">記録追加(今日以前)</a>
        </div>
    </div>
</div>

@endsection
