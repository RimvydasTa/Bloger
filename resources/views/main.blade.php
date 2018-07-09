@include('partials._head')
@include('includes.navigation.nav')
<!-- main-content -->
    <div class="container">
       @yield('content')
    </div>
<hr/><br/>
@include('partials._footer')