<!doctype html>
<html lang="en">
<head>
    @include('layouts.dashboard.header')
</head>
<body>
    <div class="wrapper">
        @include('layouts.dashboard.sidebar')
        <div class="main-panel">
            @include('layouts.dashboard.navbar')
            <div class="content">
                <div class="container-fluid">
                    @include('layouts.alert')
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    @include('layouts.dashboard.footer')
</body>
</html>
