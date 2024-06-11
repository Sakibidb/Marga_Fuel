<!DOCTYPE html>
<html lang="en">
@include('frontend.home.layouts.head')

<body>
    @include('frontend.home.layouts.navbar')
    @include('frontend.home.layouts.header')

    @yield('content')
    @include('frontend.home.layouts.footer')
    @include('frontend.home.layouts.script')
</body>

</html>

