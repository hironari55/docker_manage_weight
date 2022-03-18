@extends('layouts.app')

@section('title','weight_list')

@section('content')
<div class="container">
    <div class="dropdown mt-3">
        <a class="btn btn-outline-info dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            期間選択
        </a>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a href="{{ route('weights.weightsList', ['period' => 'week'] ) }}" class="dropdown-item">週間</a>
            <a href="{{ route('weights.weightsList', ['period' => 'month'] )}}" class="dropdown-item">月間</a>
        </div>
    </div>

    <p class="text-primary my-2">*スマホの方はリストをスクロールして表示することができます→→</p>

    <div class="card-header bg-white w-100 border border-info text-primary">
        @if ($period === 'month')
        {{ $lastMonthDay->format('m/d') }} ~ {{ date("m/d") }} (月間)
        @else
        {{ $lastWeekDay->format('m/d') }} ~ {{ date("m/d") }} (週間)
        @endif
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
                @if ($period === 'month')
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
                @else
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
                @endif
            </tbody>
        </table>
    </div>
</div>
@endsection
