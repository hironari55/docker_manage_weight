@extends('layouts.app')

@section('title','create_weight')

@section('styles')
@include('share.flatpickr.styles')
@endsection

@section('content')
<div class="card border-info mt-5 shadow-sm">
    <div class="card-header bg-transparent border-info text-info">
        体重を記録する
    </div>
    @if($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul class="mb-0 pl-0">
            @foreach($errors->all() as $message)
            <li class="list-unstyled">{{$message}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card-body text-info">
        <div class="mb-3">
            *体脂肪率、筋肉量、摂取カロリーは空白でも問題ありません。<br>
            &nbsp;&nbsp;摂取カロリーは摂取後記録しましょう
        </div>
        <form action="{{ route('weights.create') }}" method="post">
            @csrf
            <div class="form-row">
                <div class="form-group col-sm-12 col-md-3">
                    <label for="date">日付</label>
                    <input type="text" name="date" class="form-control border-info bg-white" placeholder="日付を選択" id="date" value="{{ old('date', date('Y/m/d')) }}">
                </div>
                <div class="form-group col-sm-12 col-md-2">
                    <label for="weight">体重</label>
                    <input type="text" name="weight" class="form-control border-info" placeholder="体重を入力" id="weight" value="{{ old('weight') }}">
                </div>
                <div class="form-group col-sm-12 col-md-2">
                    <label for="fat_percentage">体脂肪率</label>
                    <input type="text" name="fat_percentage" class="form-control border-info" placeholder="体脂肪率を入力" id="fat_percentage" value="{{ old('fat_percentage') }}">
                </div>
                <div class="form-group col-sm-12 col-md-2">
                    <label for="muscle_weight">筋肉量を記録</label>
                    <input type="text" name="muscle_weight" class="form-control border-info" placeholder="筋肉量を入力" id="muscle_weight" value="{{ old('muscle_weight') }}">
                </div>
                <div class="form-group col-sm-12 col-md-3">
                    <label for="calorie_intake">摂取カロリー</label>
                    <input type="text" name="calorie_intake" class="form-control border-info" placeholder="摂取カロリーを入力" id="calorie_intake" value="{{ old('calorie_intake') }}">
                </div>
            </div>
            <div class="bg-transparent border-info mt-2">
                <button type="submit" class="btn btn-outline-info w-100">記録</button>
            </div>
        </form>
    </div>
</div>

@endsection
