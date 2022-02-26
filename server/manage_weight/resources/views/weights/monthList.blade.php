@extends('layouts.app')

@section('title','weight_list')

@section('content')

<div class="dropdown">
    <a class="btn btn-outline-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        期間選択
    </a>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
        <a href="{{ route('weights.weekList') }}" class="dropdown-item">週間</a>
        <a href="{{ route('weights.monthList') }}" class="dropdown-item">月間</a>
    </div>
</div>

<div class="card-header bg-white w-100 border border-info text-primary mt-4">
    {{ $lastMonthDay->format('m/d') }} ~ {{ date("m/d") }} (月間)
</div>

<div style="display: block; overflow-x: scroll; white-space: nowrap; -webkit-overflow-scrolling: touch;">
    <table class="table table-hover bg-light shadow-sm border border-info mb-0 text-primary">
        <thead class="bg-white w-100">
            <tr>
                <th scope="col">日付</th>
                <th scope="col">体重</th>
                <th scope="col">体脂肪率</th>
                <th scope="col">筋肉量</th>
                <th scope="col">体脂肪量</th>
                <th scope="col">摂取<br>
                    カロリー</th>
            </tr>
        </thead>
        <tbody class="bg-white w-100">
            @foreach($lastMonthDays as $lastMonthDay)
            <tr>
                <td>{{date('m/d', strtotime($lastMonthDay->date))}}</td>
                <td>{{ $lastMonthDay->weight }}</td>
                <td>{{ $lastMonthDay->fat_percentage }}</td>
                <td>{{ $lastMonthDay->muscle_weight }}</td>
                <td>{{ $lastMonthDay->fat_weight }}</td>
                <td>{{ $lastMonthDay->calorie_intake }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
