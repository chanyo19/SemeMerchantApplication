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
                                    <form method="post" action="{{url('/update-appointment')}}">
                                        @csrf
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
                                                    @php
                                                        $service=explode(',',$appointment->services);
                                                    @endphp
                                                    <td>Services</td><td>
                                                           @foreach($service as $ser)
                                                            <li>{{$ser}}</li>
                                                            @endforeach
                                                        <button class="btn btn-success" style="float: right" type="button">Add Service</button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Total</td><td>Rs.{{$appointment->amount}}</td>
                                                </tr>
                                                <input type="hidden" value="{{$appointment->appointment_id}}" name="appointment_id"/>
                                                <input type="hidden" value="{{$appointment->customer->email}}" name="cus_email"/>
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
                                                    <td><button type="submit" class="btn btn-warning">UPDATE</button> <a href="{{url('/notify-customer/'.$appointment->customer->email.'/'.$appointment->appointment_id)}}" class="btn btn-success">NOTIFY CUSTOMER</a><a href="{{url('/view-my-history-appointments')}}" class="btn btn-primary">BACK</a></td>
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
                                    </form>

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
