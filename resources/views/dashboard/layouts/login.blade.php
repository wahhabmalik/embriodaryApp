<!DOCTYPE html>
<html>

<head>
	@include('dashboard.partials.header')
	@yield('styles')
</head>

<body class="gray-bg">
    <div class="middle-box text-center loginscreen animated fadeInDown">
        
    	@yield('content')
        
    </div>
    @include('dashboard.partials.footer')
    @yield('scripts')
</body>
</html>
