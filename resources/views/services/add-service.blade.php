@extends('layouts.common1')
@inject('ServiceController', 'App\Http\Controllers\Service\ServiceController')
@section('links')
@endsection
@section('content')
    <form action="{{url('addservice')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <select class="selectpicker" data-size="7" data-style="btn btn-primary btn-round" title="Single Select"
                    name="service" required>
                <option disabled selected>Select Service</option>
                @foreach($services as $service)
                    <option value="{{$service->id}}">{{$service->service}}</option>
                @endforeach
            </select>
        </div>


        <input type="text" name="price" class="form-control" placeholder="Enter Service Price" required/>

        <div class="form-group">
            <button type="submit" class="btn btn-success"/>
            Submit</button>
        </div>
    </form>

    @if(count($myServicers)>0)
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="audit_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Service Name</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Service Created</th>
                                <th>Service Updated</th>
                                <th>Settings</th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($myServicers as $servicers)

                                <tr>
                                    <td>{{$servicers->service}}</td>
                                    <td>{{$servicers->pivot->price}}</td>
                                    <td>@if($servicers->status==1)
                                            Active
                                        @else
                                            Inactive
                                        @endif
                                    </td>
                                    <td>{{$servicers->pivot->created_at}}</td>
                                    <td>{{\Carbon\Carbon::parse($servicers->pivot->updated_at)->diffForHumans()}} | {{$servicers->pivot->updated_at}}</td>
<!--                                    <td> <input  type="button" class="btn btn-danger btn-block" value="Delete" onclick="{{$ServiceController->delete($servicers->pivot->services_id)}}"/></td>-->
<!--                                    <td><a href="{{$ServiceController->delete($servicers->pivot->services_id)}}" class="editor_remove">{{$servicers->pivot->services_id}} Delete</a></td>-->

                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    @endif
@stop
@section('scripts')

    <script>

        var serviseTable= $('#audit_table').DataTable({

            dom: 'Bfrtip',
            buttons: [
                'copy',
                'csv',
                'pdf',
                'excel',
                'print'
            ]
        });

    </script>
@endsection
