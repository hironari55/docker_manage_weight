<!DOCTYPE html>
<html lang="ja">

@include('share.view.head')

<body style="background-color: #F8F8FF">
    <div id="app">
        @include('share.view.navbar')

        <main>
            @yield('content')
        </main>
    </div>

    <!-- ドロップダウン,flatpickr用スクリプト -->
    @include('share.flatpickr.scripts')
    <script>
        flatpickr(" #date", {
            locale: 'ja',
            dateFormat: "Y/m/d",
            maxDate: new Date(),
        });
    </script>

</body>

</html>
