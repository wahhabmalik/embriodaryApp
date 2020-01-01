@extends('dashboard.layouts.app')


@section('styles')
<link href="{{ asset('backend_assets/css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend_assets/css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
<link href="{{ asset('backend_assets/css/plugins/jasny/jasny-bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('backend_assets/css/plugins/datapicker/datepicker3.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.img-thumbnail{
    max-width: 120px;
    max-height: 120px;
}

.dataTables_wrapper {
     padding-bottom: 0px; 
}


</style>
@endsection

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-4">
            <h2>Order Details</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                </li>
               
                <li class="active">
                    <strong>Order Details of Order-{{ $order->order_id ?? '' }}</strong>
                </li>
            </ol>
        </div>

        <div class="col-lg-8">
            <div class="text-right">
                <br>
                <br>
                <button title="Add Booking Information" onclick="openEmailModal({{ $order->investment_id ?? '' }})" class="btn btn-success"><i class="fa fa-star"></i>&nbsp&nbspProduction</button>
                <button title="Add Booking Information" onclick="openEmailModal({{ $order->investment_id ?? '' }})" class="btn btn-primary"><i class="fa fa-clipboard"></i>&nbsp&nbspRecieving/Cleaning</button>
                <button title="Add Booking Information" onclick="openEmailModal({{ $order->investment_id ?? '' }})" class="btn btn-warning"><i class="fa fa-refresh"></i>&nbsp&nbspStatus</button>
                <button title="Add Booking Information" onclick="openEmailModal({{ $order->investment_id ?? '' }})" class="btn btn-danger"><i class="fa fa-envelope"></i>&nbsp&nbspSend Email</button>
                {{-- <a href="{{ route('start_compaign', $program) }}" class="btn btn-primary">Send Emails</a> --}}
            </div>
        </div>
        
    </div>

<br>

    <div class="row">
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right">Order ID</span>
                    <h5>Order</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">Order-{{ $order->order_id ?? '' }}</h1>
                    {{-- <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div> --}}
                    <small>Order ID</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-success pull-right">Name</span>
                    <h5>Client</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ $order->client_orders->client_name ?? 'No Client' }}</h1>
                    {{-- <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div> --}}
                    <small>Client name</small>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right">Shipment</span>
                    <h5>Shipment Method</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins">{{ $order->shipment_method ?? '' }}</h1>
                    {{-- <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div> --}}
                    <small>Clients prefered shipment method</small>
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-success pull-right">Order date</span>
                    <h5>Order date</h5>
                </div>
                <div class="ibox-content">
                    <h2 class="no-margins">{{ $order->order_date }}</h2>
                    
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-primary pull-right">Due date</span>
                    <h5>Due date</h5>
                </div>
                <div class="ibox-content">
                    <h2 class="no-margins">{{ $order->due_date }}</h2>
                    
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-warning pull-right">Ship date</span>
                    <h5>Ship date</h5>
                </div>
                <div class="ibox-content">
                    <h2 class="no-margins">{{ $order->ship_date }}</h2>
                    
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-danger pull-right">Quantity</span>
                    <h5>Quantity</h5>
                </div>
                <div class="ibox-content">
                    <h2 class="no-margins">{{ $order->quantity }}</h2>
                    
                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-danger pull-right">Invoice</span>
                    <h5>Invoice number</h5>
                </div>
                <div class="ibox-content">
                    <h2 class="no-margins">{{ $order->invoice_number }}</h2>
                    
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-danger pull-right">Notes</span>
                    <h5>Notes</h5>
                </div>
                <div class="ibox-content">
                    <p class="no-margins">{{ $order->notes }}</p>
                    
                </div>
            </div>
        </div>
    </div>


    <div class="wrapper wrapper-content ibox animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content col-sm-12">
                        <div class="table-responsive">
                            {{-- <div><h2>Flights of {{ 'PPL-'.$registrations->user_registration_id }}</h2></div> --}}
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <th>No.</th>
                                    <th>Order ID</th>
                                    <th>Logo Title</th>
                                    <th>Logo</th>
                                    <th>SC</th>
                                    <th>Location</th>
                                    <th>Thread</th>
                                    {{-- <th>Action</th> --}}
                                    
                                    
                                </thead>
                                <tbody>
                                    
                                    @foreach($order->order_productions as $key => $production)
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td>Order-{{ $production->fk_order_id }}</a></td>
                                        <td>{{ $production->logo_title }}</td>
                                        <td><img src="{{ asset($production->production_logo) }}" class="img img-thumbnail"></td>
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
                                        {{-- <td class="btn-group">
                                            <form method="POST" action="{{ route('delete_production', $production) }}" style="display: inline-block;">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button title="Delete record" type="submit" class="btn btn-danger btn-sm delete-course"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td> --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-content col-sm-12">
                        <div class="table-responsive">
                            {{-- <div><h2>Flights of {{ 'PPL-'.$registrations->user_registration_id }}</h2></div> --}}
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <th>No.</th>
                                    <th>Investment Id</th>
                                    <th>Transaction amount</th>
                                    <th>Transaction type</th>
                                    <th>Transaction date</th>
                                    <th>Entry Date</th>
                                    
                                    
                                </thead>
                                <tbody>
                                    
                                    {{-- @foreach($order->investment_transactions as $key => $transaction)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>Inv-{{ $transaction->fk_investment_id }}</td>
                                            <td class="{{ ($transaction->transaction_type == 'pay_in') ? 't_in' : 't_out' }}">{{ $transaction->transaction_amount }}</td>
                                            <td>{{ $transaction->transaction_type }}</td>
                                            <td>{{ date('d-m-Y', strtotime($transaction->transaction_date)) }}</td>
                                            <td>{{ date('d-m-Y', strtotime($transaction->created_at)) }}</td>
                                            
                                            
                                            
                                        </tr>
                                    @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

    </div>
    <br>
    <br>



<div class="modal inmodal" id="emailModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-envelope modal-icon"></i>
                <h4 class="modal-title">Email Data</h4>
                <small class="font-bold">Enter subject & body of the email here</small>
            </div>
            <form id="update_form1" action="" method="PATCH" target="_blank">
            <div class="modal-body">
                @method('PATCH')
                @csrf
                
                
                <div class="form-group row">
                    <label class="col-sm-3 control-label">Subject</label>
                    <div class="col-sm-9">
                       <input type="text" name="subject" class="form-control">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Body (optional)</label>
                    <div class="col-sm-9">
                      <textarea class="form-control" name="body" ></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-3 control-label">Statement Period</label>
                    <div class="col-sm-9" id="data_5">
                        <div class="input-daterange input-group" id="datepicker">
                            <input type="text" class="input-sm form-control" name="start" />
                            <span class="input-group-addon">to</span>
                            <input type="text" class="input-sm form-control" name="end" />
                        </div>
                    </div>
                </div>

                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Send</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection


@section('scripts')
<script src="{{ asset('backend_assets/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('backend_assets/js/plugins/dataTables/datatables.min.js') }}"></script>
<script src="{{ asset('backend_assets/js/plugins/summernote/summernote.min.js') }}"></script>
<script src="{{ asset('backend_assets/js/plugins/datapicker/bootstrap-datepicker.js') }}"></script>

<script>
    $(document).ready(function(){

        $('.summernote').summernote();

        $('#data_5 .input-daterange').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });

    });
</script>
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
                {extend: 'excel', title: 'Students'},
                {extend: 'pdf', title: 'Students'},

                {extend: 'print',
                 customize: function (win){
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

    var total = 0;
    $(".profit").each(function() {
        total += parseInt($(this).text());
    });
    $("#total_profit").text('£' + total);

    var t_in = 0;
    $(".t_in").each(function() {
        t_in += parseInt($(this).text());
    });
    $("#t_in").text('£' + t_in);

    var t_out = 0;
    $(".t_out").each(function() {
        t_out += parseInt($(this).text());
    });
    $("#t_out").text('£' + t_out);

    function openEmailModal(x){
        $('#emailModal').modal();
        $('#update_form1').attr('action', '/send_email/'+x);
    }

</script>

@endsection