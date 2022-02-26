@extends('layouts.app')

@section('title', 'manualWeightList')

@section('content')
<div class="card border-info mt-5 shadow-sm text-center">
    <div class="card-header bg-transparent border-info text-info">
        折れ線グラフ画面使い方
    </div>

    <div class="card-body text-info">
        <div class="mt-3">
            <h4 class="border-bottom border-info">メニューボタン</h4>
            <p>右上のメニューバーをタッチして折れ線グラフをタッチすると折れ線グラフ画面に遷移します。</p>
            <p>*パソコンの方は左上タイトル横の折れ線グラフをクリックしてください。</p>
            <img class="w-50" src="/images/header_graph.png" alt="折れ線グラフ">
        </div>
        <div class="mt-5">
            <h4 class="border-bottom border-info">グラフ画面</h4>
            <p>記録の推移がグラフで確認できます。</p>
            <img class="w-50" src="/images/graph.png" alt="メニュー欄折れ線グラフ">
        </div>
        <div class="mt-5">
            <h4 class="border-bottom border-info">記録選択</h4>
            <p>グラフデータ選択メニューバーから、好きな記録を選択して表示させることができます。</p>
            <img class="w-50" src="/images/graph_data_choice.png" alt="折れ線グラフデータ選択">
        </div>
        <div class="mt-5">
            <h4 class="border-bottom border-info">期間選択</h4>
            <p>期間選択メニューバーから、好きな期間を選択して表示させることができます。</p>
            <img class="w-50" src="/images/graph_period_choice.png" alt="折れ線グラフ期間選択">
        </div>
    </div>

    <div class="card-footer bg-transparent border-info text-info">
        <div class="text-left">
            <h5>別ページ使い方</h5>
            <ul>
                <li><a href="{{ route('weights.manualHome') }}">ホーム画面使い方</a></li>
                <li><a href="{{ route('weights.manualWeightList') }}">記録リスト使い方</a></li>
            </ul>
        </div>
    </div>
</div>

@endsection
