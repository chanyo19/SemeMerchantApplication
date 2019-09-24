@extends('layouts.common1')

@section('links')

@endsection
@section('content')
    <h1>My Message Conversations</h1>
    @if($conversations)
        <div class="container-fluid">


            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table id="audit_table" class="table table-bordered">
                                                <thead>
                                                <th>ID</th>
                                                <th>CUSTOMER #</th>
                                                <th>TIME</th>
                                                <th>STATUS</th>
                                                <th>ACTION</th>
                                                </thead>
                                                <tbody>
                                               @foreach($conversations as $conversation)

                                                        <tr>
                                                            <td>{{$conversation->id}}</td>

                                                          <td>{{$conversation->customer_id}}</td>


                                                           <td>{{$conversation->created_at->diffForHumans()}}</td>
                                                            <td><span class="badge badge-success">NEW</span> </td>
                                                            <td><a href="{{url('/merchant/view-my-messages/'.$conversation->id)}}" class="btn btn-warning">REPLY</a></td>
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

    @else
        <h3>You have no customers make some!!</h3>
    @endif


@stop
@section('scripts')
<script>
    $('#audit_table').DataTable();
</script>
@stop