@extends('layouts.app')

@section('title', 'manualHome')

@section('content')
<div class="card border-info mt-3 shadow-sm text-center">
    <div class="card-header bg-transparent border-info text-info">
        ホーム画面使い方
    </div>

    <div class="card-body text-info">
        <div class="mt-3">
            <h4 class="border-bottom border-info">タイトルボタン</h4>
            <p>画面上のメニューバーからタイトルを押すとホーム画面に遷移します。(ログイン後は自動的に遷移します。)</p>
            <p>*以下スマホ画面にて説明しています。パソコンの方もほぼ同様です。</p>
            <img class="w-50" src="/images/header_title.png" alt="タイトルボタン">
        </div>
        <div class="mt-5">
            <h4 class="border-bottom border-info">作成画面</h4>
            <p>タイトルボタンを押す、もしくはログイン後は、当日のデータを記録していない場合、<br>
            自動的に記録作成画面に遷移します。</p>
            <p class="">体重は1日1回のみ記録可能です。 体重は食事や水分量によってブレが生じるため、<br>
                できれば水分量など安定している朝一番に計測し、記録しましょう。</p>
            <img class="w-50" src="/images/create.png" alt="記録作成画面">
        </div>
        <div class="mt-5">
            <h4 class="border-bottom border-info">ホーム画面</h4>
            <p>タイトルボタンを押し、当日のデータが既に記録されている場合、記録毎のデータ画面に遷移します。</p>
            <p>間違えて記録をしてしまった場合は編集ボタンからデータの編集が可能です。<br>
                また、別日の記録漏れがある場合は、記録追加ボタンを押して、記録を追加しましょう</p>
            <p>日付データ横の横矢印ボタンを押すことで、別の日付のデータ画面に遷移できます</p>
            <img class="w-50" src="/images/home.png" alt="ホーム画面">
        </div>
        <div class="mt-5">
            <h4 class="border-bottom border-info">編集画面</h4>
            <p>編集ボタンを押すことで、データの編集を行うことができます。</p>
            <p>データ編集後、もう一度記録ボタンを押すことでデータが上書きされます。<br>
                *日付の編集は行えないため、日付を間違えて記録してしまった場合はデータ削除ボタンを押してもう一度新しい記録を作成してください。</p>
            <img class="w-50" src="/images/edit.png" alt="記録編集画面">
        </div>
    </div>

    <div class="card-footer bg-transparent border-info text-info">
        <div class="text-left">
            <h5>別ページ使い方</h5>
            <ul>
                <li><a href="{{ route('weights.manualWeightGraph') }}">記録折れ線グラフ使い方</a></li>
                <li><a href="{{ route('weights.manualWeightList') }}">記録リスト使い方</a></li>
            </ul>
        </div>
    </div>
</div>

@endsection
