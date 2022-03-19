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

<div class="container py-2 my-3 fastidiousness">
    <h5>こだわり(見た目)</h5>
    <ul>
        <li>トップページにイメージ画像を表示することでアプリを想像しやすくしました。</li>
        <li>水色を基調としたシンプルなデザインにしました。</li>
        <li>折れ線グラフで、記録の推移を見やすくしました。</li>
        <li>レスポンシブデザインでスマホ画面から閲覧してもデザイン崩れのないようにしました。</li>
        <li>単日の記録閲覧画面にて記録項目毎に枠で囲むことで見やすいデザインにしました。</li>
    </ul>
</div>

<div class="container py-2 my-3 fastidiousness">
    <h5>こだわり(実装)</h5>
    <ul>
        <li>ログイン後、すぐに体重記録画面に遷移するようにしました。(既にその日のデータが記録してある場合は単日の記録閲覧画面に遷移)</li>
        <li>折れ線グラフでは週間、1か月間、3か月間、半年間、年間の中から期間選択して記録を表示できるようにしました。</li>
        <li>単日の記録画面にて、日付横の矢印を押すことで、記録した日のみ前後の記録を閲覧できるようにしました。
矢印の色を、前または後のデータがある場合は青、ない場合は灰色にすることで視覚的にわかりやすくしました。</li>
    </ul>
</div>

<div class="container d-flex justify-content-around text-center my-5">
    <div class="row">
        <div class="col-sm-6">
            <div class="card border-info my-3 shadow">
                <div class="card-body">
                    <h5 class="card-title">機能詳細はこちら</h5>
                    <p class="card-text">GitHub, READMEにてインフラ構成図やER図、gifなどを用いて詳細を説明しております。</p>
                    <a href="https://github.com/hironari55/manage_weight" class="btn btn-primary">GitHub,README</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card border-info my-3 shadow">
                <div class="card-body">
                    <h5 class="card-title">経歴はこちら</h5>
                    <p class="card-text">wantedlyプロフィールにて経歴や自己紹介など記載しております</p>
                    <a href="https://www.wantedly.com/id/oregahironari_com" class="btn btn-primary">wantedlyプロフィール</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer text-center py-2">
    ©2022oregahironari
</div>

@endsection
