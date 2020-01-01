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
        <h2>All Production</h2>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('dashboard') }}">Dashboard</a>
            </li>
            <li class="active">
                <strong>Production List</strong>
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
                    <th>Order ID</th>
                    <th>Logo Title</th>
                    <th>Logo</th>
                    <th>SC</th>
                    <th>Location</th>
                    <th>Thread</th>
                    <th>Action</th>
                    
                </tr>
                </thead>
                <tbody>
                    
                    @foreach($productions as $key => $production)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>Order-{{ $production->fk_order_id }}</a></td>
                        <td>{{ $production->logo_title }}</td>
                        <td><img src="{{ $production->production_logo }}" class="img img-thumbnail"></td>
                        <td>{{ $production->sc }}</td>
                        <td>{{ $production->location }}</td>
                        <td>
                            @foreach($production->production_thread as $value)
                                <div class="label label-success pull-right">
                                    {{ $value->name }}
                                </div>
                                <br>
                            @endforeach
                        </td>
                        <td class="btn-group">
                            
                            <a href="{{ route("edit_production", $production) }}" title="Edit record" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                            
                            {{-- <button title="Update record" onclick="openStatusModal('{{ $production->orderrmation_id  }}')" class="btn btn-success btn-sm"><i class="fa fa-refresh"></i></button> --}}

                            <form method="POST" action="{{ route('delete_production', $production) }}" style="display: inline-block;">
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


{{-- Status Modal --}}

<div class="modal inmodal" id="statusModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-refresh modal-icon"></i>
                <h4 class="modal-title">Accounts information</h4>
                <small class="font-bold">Enter accounts information status here</small>
            </div>
            <form id="update_form" action="" method="POST">
            <div class="modal-body">
                <input type="hidden" name="_method" value="PATCH">
                @csrf
                
                
                <div class="form-group row">
                    <label class="col-sm-4 control-label">Closing trade date</label>
                    <div class="col-sm-8">
                        <input type="date" name="closing_trade_date" class="form-control" >
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 control-label">No of trades</label>
                    <div class="col-sm-8">
                        <input type="number" name="no_of_trades" class="form-control"  >
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 control-label">Closing balance</label>
                    <div class="col-sm-8">
                        <input type="number" name="closing_balance" class="form-control" >
                    </div>
                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
{{-- Status Modal Ends --}}


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
                {extend: 'excel', title: 'order'},
                {extend: 'pdf', title: 'order'},

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

$(document).ready(function(){
    $("body").toggleClass("mini-navbar");   
    SmoothlyMenu();
});
</script>

<script type="text/javascript">
    function openStatusModal(x){
        $('#statusModal').modal();
        $('#update_form').attr('action', 'update_order/'+x);
        $('#update_form').attr('method', 'post');
        $('#fk_contact_id').val(x);
    }
</script>
@endsection