@include('layout.header')
<div>
    @include('layout.side-bar')
    <!-- ========================= Main ==================== -->
    <div class="main">
        <div class="h-screen" style="background-image: url('http://127.0.0.1:8000/storage/images/bg.jpg'); background-size: cover">
            @yield('content')
        </div>
    </div>
</div>
@include('layout.footer')
