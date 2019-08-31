@extends('layouts.common1')

@section('links')


@endsection
@section('content')
    @if(count($appointments)>0)
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <h4 class="m-b-30 m-t-0">Today Appointments of {{auth::user()->name}}</h4>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="audit_table" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Customer Name</th>
                                            <th>Time</th>
                                            <th>Date</th>
                                            <th>Amount</th>
                                            <th>Added date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        @foreach($appointments as $item)
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->customer->full_name}}</td>

                                                <td>{{$item->timeslot->slot_info}}</td>
                                                <td>{{$item->date}}</td>
                                                <td>{{$item->amount}}</td>
                                                <td>{{$item->created_at}}</td>
                                                <td>@if($item->status==1)
                                                        Active
                                                    @else
                                                        Inactive
                                                    @endif
                                                </td>

                                                <td><a class="btn btn-success" href="{{url('/view_appointment/'.$item->appointment_id)}}"><i class="fa fa-eye"></i> </a> <button class="btn btn-success"><i class="fa fa-print"></i> </button> <button class="btn btn-primary"><i class="fa fa-envelope"></i> </button> <button class="btn btn-danger"><i class="fa fa-remove"></i> </button> </td>

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