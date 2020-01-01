@extends('dashboard.layouts.app')

@section('styles')
    <link href="{{ asset('backend_assets/css/plugins/dropzone/basic.css') }}" rel="stylesheet">
    <link href="{{ asset('backend_assets/css/plugins/dropzone/dropzone.css') }}" rel="stylesheet">
    <link href="{{ asset('backend_assets/css/plugins/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">
    
@endsection

@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Clients</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">Home</a>
            </li>
            <li>
                <a>Forms</a>
            </li>
            <li class="active">
                <strong>Clients Form</strong>
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
                @if(isset($client))
                    <form method="post" action="{{ route('update_client',$client) }}" enctype="multipart/form-data" class="form-horizontal">
                    {{ method_field('PATCH') }}
                @else 
                    <form method="post" action="{{ route('add_client') }}" enctype="multipart/form-data" class="form-horizontal">
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
                        <label class="col-sm-2 control-label">Client/Company Name</label>

                        <div class="col-sm-10">
                            <input type="text" name="client_name" class="form-control" value="{!! (isset($client)) ? $client->client_name : old('client_name') !!}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">Client/Company Logo</label>
                        <div class="col-sm-10">
                            @if (isset($client->logo)) 
                                <a href="{{ asset($client->logo) }}" target="_blank">old file</a>  
                            @endif
                            <input type="file" class="form-control" name="logo" {!! (isset($client)) ? '' : 'required' !!}>
                            
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>

                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" value="{!! (isset($client)) ? $client->email : old('email') !!}" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Phone</label>

                        <div class="col-sm-10">
                            <input type="text" name="phone" class="form-control" value="{!! (isset($client)) ? $client->phone : old('phone') !!}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2">
                            <a href="{{ url()->previous() }}" class="btn btn-white" >Cancel</a>
                            <button class="btn btn-primary" type="submit">{!! (isset($client))? "Update" : "Save" !!} changes</button>
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

@endsection