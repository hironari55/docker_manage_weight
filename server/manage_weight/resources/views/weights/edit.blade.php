@extends('layouts.app')

@section('title', 'edit_weight')

@section('styles')
@include('share.flatpickr.styles')
@endsection

@section('content')
<div class="container">
    <div class="card border-info mt-3 shadow-sm">
        <div class="card-header bg-transparent border-info text-info">
            体重記録を編集する
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
        <form action="{{ route('weights.edit', ['weight' => $weight->id]) }}" method="post">
            @csrf
            <div class="card-body text-info">
                <div class="mb-3">
                    *体脂肪率、筋肉量、基礎代謝は空白でも問題ありません。<br>
                    &nbsp;&nbsp;体脂肪率を入力した場合は体脂肪量も同時に記録されます。
                </div>

                <div class="form-row">
                    <div class="form-group col-sm-12 col-md-3">
                        <label for="date">日付</label>
                        <div class="form-control  border">{{ $weight->date }}</div>
                    </div>
                    <div class="form-group col-sm-12 col-md-2">
                        <label for="weight">体重</label>
                        <input type="text" name="weight" class="form-control border-info" placeholder="体重を入力" id="weight" value="{{ old('weight', $weight->weight) }}">
                    </div>
                    <div class="form-group col-sm-12 col-md-2">
                        <label for="fat_percentage">体脂肪率</label>
                        <input type="text" name="fat_percentage" class="form-control border-info" placeholder="体脂肪率を入力" id="fat_percentage" value="{{ old('fat_percentage', $weight->fat_percentage) }}">
                    </div>
                    <div class="form-group col-sm-12 col-md-2">
                        <label for="muscle_weight">筋肉量を記録</label>
                        <input type="text" name="muscle_weight" class="form-control border-info" placeholder="筋肉量を入力" id="muscle_weight" value="{{ old('muscle_weight', $weight->muscle_weight) }}">
                    </div>
                    <div class="form-group col-sm-12 col-md-3">
                        <label for="calorie_intake">摂取カロリー</label>
                        <input type="text" name="calorie_intake" class="form-control border-info" placeholder="摂取カロリーを入力" id="calorie_intake" value="{{ old('calorie_intake', $weight->calorie_intake) }}">
                    </div>
                </div>
            </div>
            <div class="card-footer bg-transparent border-info">
                <button type="submit" class="btn btn-outline-info w-100">記録</button>
            </div>
        </form>
        <div class="card-footer bg-transparent border-info">
            <button class="btn btn-outline-danger w-100 p-0 " data-toggle="modal" data-target="#deleteModal">
                削除
            </button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">削除確認画面</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    本当に削除してもよろしいですか？
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                    <form action="{{ route('weights.delete', ['weight' => $weight->id])}}" method="post">
                        @method("DELETE")
                        @csrf
                        <input type="submit" value="削除" class="btn btn-danger">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
