@extends('dashboard.layouts.app')

@section('styles')
    <link href="{{ asset('backend_assets/css/plugins/dropzone/basic.css') }}" rel="stylesheet">
    <link href="{{ asset('backend_assets/css/plugins/dropzone/dropzone.css') }}" rel="stylesheet">
    <link href="{{ asset('backend_assets/css/plugins/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend_assets/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend_assets/css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
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
                <h5>Enter new thread here</h5>
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
                <form method="post" action="{{ route('add_thread') }}" enctype="multipart/form-data" class="form-horizontal">
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
                        <label class="col-sm-1 control-label">Name</label>

                        <div class="col-sm-5">
                            <input type="text" name="name" class="form-control" value="{!! (isset($production)) ? $production->name : old('name') !!}" required>
                        </div>

                        <label class="col-sm-1 control-label">Color</label>

                        <div class="col-sm-5">
                            <input type="text" name="color" class="form-control" value="{!! (isset($production)) ? $production->color : old('color') !!}" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-1">
                            <button class="btn btn-primary" type="submit">{!! (isset($production))? "Update" : "Save" !!} changes</button>
                        </div>
                    </div>
                </form>
            </div>


            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox float-e-margins">
                            <div class="ibox-title">
                                {{-- <h5>Basic Data Tables example with responsive plugin</h5> --}}
                                <div class="ibox-tools">
                                    <a class="collapse-link">
                                        <i class="fa fa-chevron-up"></i>
                                    </a>
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <i class="fa fa-wrench"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                                       {{--  <li><a href="#">Config option 1</a>
                                        </li>
                                        <li><a href="#">Config option 2</a>
                                        </li> --}}
                                    </ul>
                                    
                                </div>
                            </div>
                            <div class="ibox-content">

                                <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Thread name</th>
                                <th>Thread color</th>
                                <th>Action</th>
                                
                            </tr>
                            </thead>
                            <tbody>
                                
                                @foreach($threads as $key => $thread)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $thread->name }}</td>
                                    <td>{{ $thread->color }}</td>
                                    <td class="btn-group">
                                        
                                        <form method="POST" action="{{ route('delete_thread', $thread) }}" style="display: inline-block;">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button title="Delete record" type="submit" class="btn btn-danger btn-sm delete-course"><i class="fa fa-trash"></i></button>
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<br>
<br>
@endsection


@section('scripts')
<script src="{{ asset('backend_assets/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('backend_assets/js/plugins/dataTables/datatables.min.js') }}"></script>
<!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'thread'},
                    {extend: 'pdf', title: 'thread'},

                    {
                        extend: 'print',
                        customize: function (win)
                        {
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');
                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                        }
                    }
                ]

            });

        });

    </script>

    <script>

    $('.delete-course').click(function(e){
        e.preventDefault()
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this data!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
        }, function () {
            swal("Deleted!", "Your imaginary data has been deleted.", "success");
            $(e.target).closest('form').submit() // Post the surrounding form
        });
    });
</script>
@endsection