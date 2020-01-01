@extends('dashboard.layouts.app')


@section('styles')
<link href="{{ asset('backend_assets/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend_assets/css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
<style>
.img-thumbnail{ 
    padding:0px; 
}
.cart-product-imitation {
    height: unset;
    width: unset;
    max-height: 60px;
    max-width: 60px;
}
img.img.img-thumbnail {
    max-width: 80px;
}

</style>
@endsection

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>All Clients</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
                <li class="active">
                    <strong>Clients List</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">
            <div>
                <br>
                {{-- <a href="{{ route('create_company') }}" class="btn btn-primary">Add New</a> --}}
            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Basic Data Tables example with responsive plugin</h5>
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
                    <th>Client name</th>
                    <th>Client logo</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Entry Date</th>
                    <th>Action</th>
                    
                </tr>
                </thead>
                <tbody>
                    
                    @foreach($clients as $key => $client)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>{{ $client->client_name }}</td>
                        <td><img src="{{ $client->client_logo }}" class="img img-thumbnail"></td>
                        <td>{{ $client->phone }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ date('d-m-Y', strtotime($client->created_at)) }}</td>
                    
						<td class="btn-group">
                            
                            <a href="{{ route('edit_client', $client) }}" title="Edit record" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>

                            <form method="POST" action="{{ route('delete_client', $client) }}" style="display: inline-block;">
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
                    {extend: 'excel', title: 'clients'},
                    {extend: 'pdf', title: 'clients'},

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