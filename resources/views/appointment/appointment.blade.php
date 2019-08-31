@extends('layouts.common1')

@section('links')


@endsection
@section('content')
    @if($appointment)
        <div class="container-fluid">
            <h2 class="m-b-30 m-t-0">Appointment ID {{$appointment->appointment_id}}</h2>

            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table id="audit_table" class="table table-bordered">

                                            <tbody>
                                            <tr>
                                                <td>Date</td><td>{{$appointment->date}}</td>
                                            </tr>
                                            <tr>
                                                <td>Customer</td><td>{{$appointment->customer->full_name}}</td>
                                            </tr>
                                            <tr>
                                                <td>Time</td><td>{{$appointment->timeslot->slot_info}}</td>
                                            </tr>
                                            <tr>
                                                <td>Contact Number</td><td>{{$appointment->customer->mobile_number}}</td>
                                            </tr>
                                            <tr>
                                                <td>Services</td><td>{{$appointment->services}}</td>
                                            </tr>
                                            <tr>
                                                <td>Total</td><td>{{$appointment->amount}}</td>
                                            </tr>
                                            <tr>
                                                <td>Status</td><td>
                                                    <select class="form-control" name="app_status">
                                                        @if($appointment->status==1)
                                                            <option value="1" selected>Pending</option>
                                                            <option value="2" >Approved</option>
                                                            <option value="3" >Cancelled</option>
                                                         @elseif($appointment->status==2)
                                                            <option value="1" >Pending</option>
                                                            <option value="2" selected>Approved</option>
                                                            <option value="3" >Cancelled</option>
                                                            @else
                                                            <option value="1" >Pending</option>
                                                            <option value="2" >Approved</option>
                                                            <option value="3" selected>Cancelled</option>
                                                        @endif
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Action</td>
                                                <td><a href="#" class="btn btn-warning">UPDATE</a> <a href="#" class="btn btn-success">NOTIFY CUSTOMER</a><a href="/view-my-history-appointments" class="btn btn-primary">BACK</a></td>
                                            </tr>
                                            {{--<tr>--}}
                                            {{--<td>{{$item->id}}</td>--}}
                                            {{--<td>{{$item->customer->full_name}}</td>--}}

                                            {{--<td>{{$item->timeslot->slot_info}}</td>--}}
                                            {{--<td>{{$item->date}}</td>--}}
                                            {{--<td>{{$item->amount}}</td>--}}
                                            {{--<td>{{$item->created_at}}</td>--}}
                                            {{--<td>@if($item->status==1)--}}
                                            {{--Active--}}
                                            {{--@else--}}
                                            {{--Inactive--}}
                                            {{--@endif--}}
                                            {{--</td>--}}

                                            {{--<td><a class="btn btn-success" href="/view_appointment/{{$item->appointment_id}}"><i class="fa fa-eye"></i> </a> <button class="btn btn-success"><i class="fa fa-print"></i> </button> <button class="btn btn-primary"><i class="fa fa-envelope"></i> </button> <button class="btn btn-danger"><i class="fa fa-remove"></i> </button> </td>--}}

                                            {{--</tr>--}}


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

    @else
        <h3>You have no customers make some!!</h3>
    @endif


@stop
