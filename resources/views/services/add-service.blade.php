@extends('layouts.common1')

@section('links')
@endsection
@section('content')
    <form action="{{url('addservice')}}" method="post" >
        {{csrf_field()}}
        <div class="form-group">
            <select class="selectpicker" data-size="7" data-style="btn btn-primary btn-round" title="Single Select" name="service" required>
                <option disabled selected>Select Service</option>
                @foreach($services as $service)
                    <option value="{{$service->id}}">{{$service->service}}</option>
                @endforeach
            </select>
        </div>


            <input type="text" name="price" class="form-control" placeholder="Enter Service Price" required/>

        <div class="form-group">
            <button type="submit" class="btn btn-success"/>Submit</button>
        </div>
    </form>
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