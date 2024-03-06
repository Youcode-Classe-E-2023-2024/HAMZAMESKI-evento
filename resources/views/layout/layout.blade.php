@include('layout.header')
<div>
    @include('layout.side-bar')
    <!-- ========================= Main ==================== -->
    <div class="main">
        <div class="h-screen">
            @yield('content')
        </div>
    </div>
</div>
@include('layout.footer')
