@extends('layouts.app')

@section('title', 'welcome_manage_weight')

@section('content')
<div class="first_image">
    <div class="btn-group d-flex">
        <a class="login_button btn btn-primary mr-3 p-1" href="http://manage-weight.link/login">ログイン</a>
        <a class="guestLogin_button btn btn-success p-1" href="{{ route('login.guest') }}">ゲストログイン</a>
    </div>
</div>

<div class="description py-3 px-4">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col mb-2">
            <div class="card h-100 mine-card shadow">
            <img src="../images/day-record.png" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">体重記録機能</h5>
                <p class="card-text">体重、筋肉量、体脂肪率など簡単に記録、編集ができます。</p>
            </div>
            </div>
        </div>
        <div class="col mb-2">
            <div class="card h-100 mine-card shadow">
            <img src="../images/graph-pc.png" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">折れ線グラフ機能</h5>
                <p class="card-text">週間〜年間の中から期間を選び、それぞれの記録の項目毎に折れ線グラフで記録を閲覧することができます</p>
            </div>
            </div>
        </div>
        <div class="col mb-2">
            <div class="card h-100 mine-card shadow">
            <img src="../images/list-pc.png" class="card-img-top" alt="">
            <div class="card-body">
                <h5 class="card-title">リスト機能</h5>
                <p class="card-text">週間、月間のどちらかから期間を選び、すべての項目の記録をテーブル表示し、閲覧可能です。</p>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-around text-center my-5">
    <div>
        <h5 class="mb-1">機能詳細</h5>
        <a href="https://github.com/hironari55/manage_weight" class="btn btn-primary">GitHub,README</a>
    </div>
    <div>
        <h5 class="mb-1">経歴</h5>
        <a href="https://www.wantedly.com/id/oregahironari_com" class="btn btn-primary">wantedlyプロフィール</a>
    </div>
</div>

<div class="footer text-center py-2">
    ©2022oregahironari
</div>

@endsection
