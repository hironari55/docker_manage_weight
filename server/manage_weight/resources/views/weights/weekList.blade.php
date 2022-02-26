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
    <div>{{ $lastWeekDay->format('m/d') }} ~ {{ date("m/d") }} (週間)</div>
</div>
<div style="display: block; overflow-x: scroll; white-space: nowrap; -webkit-overflow-scrolling: touch;">
    <table class="table table-hover bg-light shadow-sm border border-info mb-0 text-primary">
        <thead class="bg-white">
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
        <tbody class="bg-white">
            @foreach($lastWeekDays as $lastWeekDay)
            <tr>
                <td>{{date('m/d', strtotime($lastWeekDay->date))}}</td>
                <td>{{ $lastWeekDay->weight }}</td>
                <td>{{ $lastWeekDay->fat_percentage }}</td>
                <td>{{ $lastWeekDay->muscle_weight }}</td>
                <td>{{ $lastWeekDay->fat_weight }}</td>
                <td>{{ $lastWeekDay->calorie_intake }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
