<!DOCTYPE html>
<html lang="en">

@include('layouts_landing.head')

<body class="index-page">

    @include('layouts_landing.header')

    <main class="main">

        @yield('content')

    </main>

    @include('layouts_landing.footer')
</body>
    @stack('js')
</html>
