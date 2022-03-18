@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card text-info border-info">
            <div class="card-header bg-white border-info">ログイン画面</div>

            <div class="card-body">
                @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $message)
                    <p>{{$message}}</p>
                    @endforeach
                </div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control border-info" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control border-info" name="password" required autocomplete="current-password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary w-100">
                                ログイン
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-md-4">
                                <a href="{{ route('login.guest') }}" class="btn btn-primary w-100">
                                    ゲストログイン
                                </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-md-4 mt-3">
                            <a class="border-bottom" href="{{ route('register') }}">
                                会員登録はこちらから
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 offset-md-4 mt-2">
                                @if (Route::has('password.request'))
                                <a class="border-bottom" href="{{ route('password.request') }}">
                                    パスワードを忘れた
                                </a>
                                @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
