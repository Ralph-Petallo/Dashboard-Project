<!DOCTYPE html>
<html>

<head>
    @include('admin.style')
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.nav-index')
        <!-- Sidebar Navigation end-->
        @include('admin.body')
        @include('admin.footer')
</body>

</html>
