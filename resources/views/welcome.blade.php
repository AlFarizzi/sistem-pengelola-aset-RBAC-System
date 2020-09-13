@include('templates/header')
<body>
    <div class="wrapper sidebar_minimize">
        @include('partials/navbar') @include('partials/sidebar') @yield('content')
    </div>
    @include('templates/footer')