<!DOCTYPE html>
<html lang="ja">

@include('share.view.head')

<body class="pb-3" style="background-color: #F8F8FF">
    <div id="app">
        @include('share.view.navbar')

        <main class="pt-5 mt-3">
            <div class="container">
                <div class="d-flex">
                    @yield('content')
                    <div class="dropdown mx-2">
                        <a class="btn btn-outline-info dropdown-toggle p-1" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            期間選択
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="{{ route('weights.weekGraph', ['id' => $data_id]) }}">週間</a>
                            <a class="dropdown-item" href="{{ route('weights.oneMonthGraph', ['id' => $data_id]) }}">月間</a>
                            <a class="dropdown-item" href="{{ route('weights.threeMonthGraph', ['id' => $data_id]) }}">3ヶ月</a>
                            <a class="dropdown-item" href="{{ route('weights.halfYearGraph', ['id' => $data_id]) }}">半年</a>
                            <a class="dropdown-item" href="{{ route('weights.oneYearGraph', ['id' => $data_id]) }}">年間</a>
                        </div>
                    </div>
                </div>
                <canvas id="weights" class="w-100 mt-4"></canvas>
            </div>
        </main>
    </div>
    <!-- ドロップダウン,flatpickr用スクリプト -->
    @include('share.flatpickr.scripts')
    <!-- チャートJS用スクリプト -->
    @include('share.chart.scripts')

    <script>
        (function() {
            var ctx = document.getElementById("weights");

            var data = {
                labels: @json($eachDate),
                datasets: [{
                    label: @json($dataLabel.
                        ' '.$period),
                    data: @json($eachWeightData), //配列でデータをセット
                    borderColor: '#FFAD90', //ボーダーの色
                    lineTension: 0, //折れ線を直線にする
                    fill: false, //グラフ下の塗りつぶしを解消
                    spanGaps: true //欠損データ補填
                }]
            };

            var options = {};
            var ex_chart = new Chart(ctx, {
                type: 'line', //折れ線グラフ
                data: data, //上記設定のデータ
                options: options
            });
        }());
    </script>
</body>

</html>
