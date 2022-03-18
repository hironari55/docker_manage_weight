<!DOCTYPE html>
<html lang="ja">

@include('share.view.head')

<body class="pb-3" style="background-color: #F8F8FF">
    <div id="app">
        @include('share.view.navbar')

        <main>
                @yield('content')
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
                        ' '.$displayPeriod),
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
