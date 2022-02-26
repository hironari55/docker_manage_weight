<!DOCTYPE html>
<html lang="ja">

@include('share.view.head')

<body style="background-color: #F8F8FF">
    <div id="app">
        @include('share.view.navbar')

        <main class="pt-5 mt-3">
            <div class="container">
                @yield('content')
            </div>
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
