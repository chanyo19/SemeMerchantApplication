@extends('layouts.common1')

@section('links')


@endsection
@section('content')
    @if(count($customers)>0)
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <h4 class="m-b-30 m-t-0">Customer of {{\Illuminate\Support\Facades\Auth::user()->merchant_name}}</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="audit_table" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Customer Name</th>
                                        <th>Customer City</th>
                                        <th>Customer Address</th>
                                        <th>Customer Mobile</th>
                                        <th>Customer Email</th>
                                        <th>Customer Status</th>
                                        <th>Customer Created</th>
                                    </tr>

                                    </thead>
                                    <tbody>
                                    @foreach($customers as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->full_name}}</td>

                                            <td>{{$item->city}}</td>
                                            <td>{{$item->address}}</td>
                                            <td>{{$item->mobile_number}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>@if($item->status==1)
                                                    Active
                                                @else
                                                    Inactive
                                                @endif
                                            </td>

                                            <td>{{\Carbon\Carbon::parse($item->created_at)->diffForHumans()}} | {{$item->created_at}}</td>

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