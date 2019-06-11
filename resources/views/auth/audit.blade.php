@extends('layouts.common1')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <h4 class="m-b-30 m-t-0">Audit Log</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table id="audit_table" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>User</th>
                                        <th>Action Url</th>
                                        <th>Is Abnormal</th>
                                        <th>Audited At</th>

                                    </tr>

                                    </thead>
                                    <tbody>
                                    @foreach($data as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>

                                            <td>{{$item->user}}</td>
                                            <td>{{$item->action_url}}</td>
                                            <td>@if($item->is_abnormal==0)
                                                    NO
                                                @else
                                                    YES
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
        <!-- end col -->


    </div>

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