@include('admin.header')
<div class="container-fluid">
    <div class="row">
        @include('admin.sidebar')
        @yield('content')
    </div>
</div>
@include('admin.footer')