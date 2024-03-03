@include('layout.header')
<div class="container">
    @include('layout.side-bar')
    <!-- ========================= Main ==================== -->
    <div class="main">
        <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
        </div>
        <div>
            @yield('content')
        </div>
    </div>
</div>
@include('layout.footer')
