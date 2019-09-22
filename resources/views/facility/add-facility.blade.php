@extends('layouts.common1')
@section('links')
@endsection
@section('content')
    <br>
    <br>
    <br>
    <br>
    <form action="{{url('merchant/add-facility')}}" method="post">
        {{csrf_field()}}


        <input type="text" name="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="Enter Staffer Name" required   value="{{ old('name') }}"/>
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
        <div class="form-group">
            <button type="submit" class="btn btn-success"/>
                Submit
            </button>
        </div>
    </form>

    @if(count($facilities)>0)
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="audit_table" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Facility Name</th>
                                <th>Status</th>
                                <th>Added</th>
                                <th>Action</th>

                            </tr>

                            </thead>
                            <tbody>
                            @foreach($facilities as $facility)

                                <tr>
                                    <td>{{$facility->facility_name}}</td>
                                    <td>@if($facility->is_active)
                                            Active
                                        @else
                                            Inactive
                                        @endif
                                    </td>
                                    <td>{{$facility->created_at->diffForHumans()}}</td>
                                    <td><a href="#" class="btn btn-danger"><i class="fa fa-remove"></i> </a> </td>

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
