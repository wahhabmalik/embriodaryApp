@extends('dashboard.layouts.app')

@section('styles')
    <link href="{{ asset('backend_assets/css/plugins/dropzone/basic.css') }}" rel="stylesheet">
    <link href="{{ asset('backend_assets/css/plugins/dropzone/dropzone.css') }}" rel="stylesheet">
    <link href="{{ asset('backend_assets/css/plugins/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">
    
@endsection

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Orders</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li>
                <a>Forms</a>
            </li>
            <li class="active">
                <strong>Orders Form</strong>
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
                @if(isset($order))
                    <form method="post" action="{{ route('update_order',$order) }}" enctype="multipart/form-data" class="form-horizontal">
                    {{ method_field('PATCH') }}
                @else 
                    <form method="post" action="{{ route('add_order') }}" enctype="multipart/form-data" class="form-horizontal">
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
                        <label class="col-sm-2 control-label">Select Client</label>

                        <div class="col-sm-10">
                            <select name="fk_client_id" id="fk_investment_id" class="form-control" {{ (isset($order)) ? 'disabled' : '' }}>
                                <option value="">Select Client</option>
                                @foreach($clients as $client)
                                    <option
                                    value="{{ $client->client_id }}" 
                                    {!! (isset($order)) && ($order->fk_client_id == $client->client_id) ? 'selected' : ''  !!}

                                    >{{ $client->client_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Order date</label>

                        <div class="col-sm-10">
                            <input type="date" name="order_date" class="form-control" value="{!! (isset($order)) ? $order->order_date : old('order_date') !!}" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Due date</label>

                        <div class="col-sm-10">
                            <input type="date" name="due_date" class="form-control" value="{!! (isset($order)) ? $order->due_date : old('due_date') !!}" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Shipment method</label>

                        <div class="col-sm-10">
                            <input type="text" name="shipment_method" class="form-control" value="{!! (isset($order)) ? $order->shipment_method : old('shipment_method') !!}" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Ship date</label>

                        <div class="col-sm-10">
                            <input type="date" name="ship_date" class="form-control" value="{!! (isset($order)) ? $order->ship_date : old('ship_date') !!}" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Invoice number</label>

                        <div class="col-sm-10">
                            <input type="number" name="invoice_number" class="form-control" value="{!! (isset($order)) ? $order->invoice_number : old('invoice_number') !!}" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Quantity</label>

                        <div class="col-sm-10">
                            <input type="number" name="quantity" class="form-control" value="{!! (isset($order)) ? $order->quantity : old('quantity') !!}" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Notes</label>

                        <div class="col-sm-10">
                            <textarea name="notes" class="form-control" >{!! (isset($order)) ? $order->notes : old('notes') !!}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <a href="{{ url()->previous() }}" class="btn btn-white" >Cancel</a>
                            <button class="btn btn-primary" type="submit">{!! (isset($order))? "Update" : "Save" !!} changes</button>
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
<script type="text/javascript">
    $( "#fk_investment_id" ).change(function() {
        $('#available_amount').val($(this).find(':selected').data( "amount" ));
        $('#opening_bal').attr({"max":$(this).find(':selected').data( "amount" )});
    });
</script>
@endsection