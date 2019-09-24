@extends('layouts.common1')

@section('links')


@endsection
@section('content')
    @if(count($invoices)>0)
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <h4 class="m-b-30 m-t-0">Invoices of {{auth::user()->name}}</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="audit_table" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>APPOINTMENT ID</th>
                                            <th>CUSTOMER ID</th>
                                            <th>SERVICES</th>
                                            <th>AMOUNT</th>
                                            <th>DISCOUNT</th>
                                            <th>INVOICED PERSON</th>
                                            <th>OUTSTANDING BAL</th>
                                            <th>TYPE</th>
                                            <th>STATUS</th>
                                            <th>CREATED AT</th>
                                            <th>ACTION</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        @foreach($invoices as $item)
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->appointment_id}}</td>

                                                <td>{{$item->customer_id}}</td>
                                                <td>{{$item->services}}</td>
                                                <td>{{$item->amount}}</td>
                                                <td>{{$item->discount}}</td>
                                                <td>{{\App\Models\Merchant\Merchant::find($item->invoiced_person)->merchant_name}}</td>
                                                <td>{{$item->outstanding_balance}}</td>
                                                <td>@if($item->type==0)
                                                        <span class="badge badge-danger" >NOT PAID
                                                        </span>

                                                    @elseif($item->type==1)
                                                        <span class="badge badge-success" >PAID
                                                        </span>
                                                    @else
                                                        <span class="badge badge-warning" >P-PAID
                                                        </span>

                                                    @endif
                                                </td>
                                                <td>@if($item->type==0)
                                                        <span class="badge badge-warning" >INACTIVE
                                                        </span>

                                                    @else
                                                        <span class="badge badge-success" >ACTIVE</span>


                                                    @endif
                                                </td>
                                                <td>{{$item->created_at}}</td>
                                                <td><a class="btn btn-success" href="{{url('/merchant/my-invoice-view/'.$item->id."/".$item->appointment_id)}}"><i class="fa fa-eye"></i> </a> <a href="{{url('/generate-invoice/'.$item->appointment_id)}}" class="btn btn-success"><i class="fa fa-print"></i> </a> <button class="btn btn-primary"><i class="fa fa-envelope"></i> </button> <button class="btn btn-danger"><i class="fa fa-remove"></i> </button> </td>

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
    @else
        <h3>You have no customers make some!!</h3>
    @endif


@stop
@section('scripts')

    <script>
        $('#audit_table').DataTable({

            dom:'Bfrtip',
            buttons:  [
                'copy',
                'csv',
                'pdf',
                'excel',
                'print'
            ]
        });
    </script>
@endsection