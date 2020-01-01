@extends('dashboard.layouts.app')

@section('content')
<div class="row  border-bottom dashboard-header" style="background-color: #ffffff;">
	{{-- <div class="col-sm-5"></div> --}}
	<div class="col-sm-12">
		<img style="margin:auto" width="180" src="{{ asset('backend_assets/img/logo.png') }}" class="img img-responsive ">
		{{-- <br> --}}
		{{-- <h3 class="text-center text-white">Unlimited Embroidery App</h3> --}}
	</div>
</div>
<br>
<div class="row">
    {{-- <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-success pull-right">Monthly</span>
                <h5>Clients</h5>
            </div>
            <div class="ibox-content">
                <h1 class="no-margins">{{ $client_count }}</h1>
                <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>
                <small>Total Clients</small>
            </div>
        </div>
    </div> --}}

    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-info pull-right">Investments</span>
                <h5>Invested</h5>
            </div>
            <div class="ibox-content">
                {{-- <h1 class="no-margins">£{{ number_format($total_invested,2) }}</h1> --}}
                {{-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div> --}}
                <small>Total Invested</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-primary pull-right">Holdings</span>
                <h5>Holdings</h5>
            </div>
            <div class="ibox-content">
                {{-- <h1 class="no-margins">£{{ number_format($holdings,2) }}</h1> --}}
                {{-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> --}}
                <small>New Holdings</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-danger pull-right">Profit</span>
                <h5>Net Profit</h5>
            </div>
            <div class="ibox-content">
                {{-- <h1 class="no-margins">£{{ number_format($net_profit,2) }}</h1> --}}
                {{-- <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div> --}}
                <small>Total Net Profit</small>
            </div>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-success pull-right">Withdraw</span>
                <h5>Payed Out</h5>
            </div>
            <div class="ibox-content">
                {{-- <h1 class="no-margins">£{{ number_format($total_withdraw,2) }}</h1> --}}
                {{-- <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div> --}}
                <small>Total Payed Out</small>
            </div>
        </div>
	</div>
</div>


       
@endsection



@section('scripts')
	
<!-- Flot -->
<script src="{{ asset('backend_assets/js/plugins/flot/jquery.flot.js') }}"></script>
<script src="{{ asset('backend_assets/js/plugins/flot/jquery.flot.tooltip.min.js') }}"></script>
<script src="{{ asset('backend_assets/js/plugins/flot/jquery.flot.spline.js') }}"></script>
<script src="{{ asset('backend_assets/js/plugins/flot/jquery.flot.resize.js') }}"></script>
<script src="{{ asset('backend_assets/js/plugins/flot/jquery.flot.pie.js') }}"></script>
<script src="{{ asset('backend_assets/js/plugins/flot/jquery.flot.symbol.js') }}"></script>
<script src="{{ asset('backend_assets/js/plugins/flot/jquery.flot.time.js') }}"></script>


<!-- EayPIE -->
<script src="{{ asset('backend_assets/js/plugins/easypiechart/jquery.easypiechart.js') }}"></script>

<script>

</script>
@endsection