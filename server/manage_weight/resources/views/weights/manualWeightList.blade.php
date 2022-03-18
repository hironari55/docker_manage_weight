@extends('layouts.app')

@section('title', 'manualWeightList')

@section('content')
<div class="container">
    <div class="card border-info mt-3 shadow-sm text-info text-center">
        <div class="card-header bg-transparent border-info">
            記録リスト画面使い方
        </div>

        <div class="card-body">
            <div class="mt-3">
                <h4 class="border-bottom border-info">メニューボタン</h4>
                <p>右上のメニューバーをタッチして記録リストをタッチすると記録リスト画面に遷移します。</p>
                <p>*パソコンの方は左上タイトル横の記録リストをクリックしてください。</p>
                <img class="w-50" src="/images/header_graph.png" alt="記録リスト">
            </div>
            <div class="mt-5">
                <h4 class="border-bottom border-info">記録リスト</h4>
                <p>記録したデータがテーブルに表示されます。</p>
                <p>*スマホの場合、見切れているデータはテーブルをスライドすることで閲覧可能です。</p>
                <img class="w-50" src="/images/data_list.png" alt="折れ線グラフ期間選択">
            </div>
            <div class="mt-5">
                <h4 class="border-bottom border-info">期間選択</h4>
                <p>期間選択メニューバーから、週間データと月間データから好きな方を選んで表示させることが可能です。</p>
                <img class="w-50" src="/images/date_list_period_choice.png" alt="折れ線グラフ期間選択">
            </div>
        </div>

        <div class="card-footer bg-transparent border-info">
            <div class="text-left">
                <h5>別ページ使い方</h5>
                <ul>
                    <li><a href="{{ route('weights.manualHome') }}">ホーム画面使い方</a></li>
                    <li><a href="{{ route('weights.manualWeightGraph') }}">記録折れ線グラフ使い方</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
