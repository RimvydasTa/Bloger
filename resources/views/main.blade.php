@include('partials._head')
@include('includes.navigation.nav')

<!-- main-content -->
    <div class="container">
        <!-- Flash_messages -->
        @include('partials._flash_messages')
        @yield('content')
    </div>
<hr/><br/>
@include('partials._footer')