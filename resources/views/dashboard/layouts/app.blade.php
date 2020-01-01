<!DOCTYPE html>
<html>

<head>
	@include('dashboard.partials.header')
	@yield('styles')
</head>

<body>
    <div id="wrapper">
    	@include('dashboard.partials.sidebar')
    	<div id="page-wrapper" class="gray-bg dashbard-1">
    	@include('dashboard.partials.navbar')

    	@yield('content')
        @include('dashboard.partials.credits')
    	</div>
    </div>
    @include('dashboard.partials.footer')
    @yield('scripts')
</body>
</html>
