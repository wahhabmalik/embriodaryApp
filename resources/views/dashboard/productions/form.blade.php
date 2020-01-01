@extends('dashboard.layouts.app')

@section('styles')
    <link href="{{ asset('backend_assets/css/plugins/dropzone/basic.css') }}" rel="stylesheet">
    <link href="{{ asset('backend_assets/css/plugins/dropzone/dropzone.css') }}" rel="stylesheet">
    <link href="{{ asset('backend_assets/css/plugins/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend_assets/css/plugins/select2/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend_assets/css/plugins/chosen/bootstrap-chosen.css') }}" rel="stylesheet">
    
@endsection

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Production</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li>
                <a>Forms</a>
            </li>
            <li class="active">
                <strong>Production Form</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5></h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#">Config option 1</a>
                        </li>
                        <li><a href="#">Config option 2</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="ibox-content">
                @if(isset($production))
                    <form method="post" action="{{ route('update_production',$production) }}" enctype="multipart/form-data" class="form-horizontal">
                    {{ method_field('PATCH') }}
                @else 
                    <form method="post" action="{{ route('add_production') }}" enctype="multipart/form-data" class="form-horizontal">
                @endif
                    @csrf
                    

                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Select orders</label>

                        <div class="col-sm-10">
                            <select name="fk_order_id" id="fk_order_id" class="form-control" {{ (isset($order)) ? 'disabled' : '' }}>
                                <option value="">Select Orders</option>
                                @foreach($orders as $order)
                                    <option
                                    value="{{ $order->order_id }}" 
                                    {!! (isset($production)) && ($production->fk_order_id == $order->order_id) ? 'selected' : ''  !!}

                                    >Order-{{ $order->order_id }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Shipment method</label>

                        <div class="col-sm-10">
                            <input type="text" name="logo_title" class="form-control" value="{!! (isset($production)) ? $production->logo_title : old('logo_title') !!}" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Client/Company Logo</label>
                        <div class="col-sm-10">
                            @if (isset($production->production_logo)) 
                                <a href="{{ asset($production->production_logo) }}" target="_blank">old file</a>  
                            @endif
                            <input type="file" class="form-control" name="production_logo" {!! (isset($production)) ? '' : 'required' !!}>
                            
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">SC</label>

                        <div class="col-sm-10">
                            <input type="text" name="sc" class="form-control" value="{!! (isset($production)) ? $production->sc : old('sc') !!}" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Location</label>

                        <div class="col-sm-10">
                            <input type="text" name="location" class="form-control" value="{!! (isset($production)) ? $production->location : old('location') !!}" required>
                        </div>
                    </div>

                    <div class="form-group"><label class="col-sm-2 control-label">Características</label>

                        <div class="col-sm-10">
                            <select name="fk_thread_id[]" data-placeholder="All Threads" class="chosen-select" multiple tabindex="4" required>
                                @foreach($threads as $thread)
                                    <option 
                                    @if(isset($production))
                                        @foreach($production->production_thread as $value)
                                            {{ ($value->name == $thread->name) ? 'selected' : '' }}
                                        @endforeach
                                    @endif
                                    value="{{ $thread->thread_id }}">{{ $thread->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <a href="{{ url()->previous() }}" class="btn btn-white" >Cancel</a>
                            <button class="btn btn-primary" type="submit">{!! (isset($production))? "Update" : "Save" !!} changes</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<br>
<br>
@endsection


@section('scripts')
<script src="{{ asset('backend_assets/js/plugins/select2/select2.full.min.js') }}"></script>
    <!-- Data picker -->
<script src="{{ asset('backend_assets/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>
<script src="{{ asset('backend_assets/js/plugins/chosen/chosen.jquery.js') }}"></script>

<script>
    $('.chosen-select').chosen({width: "100%"});
    $(".select2_demo_1").select2();

</script>
@endsection