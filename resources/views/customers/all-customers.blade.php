@extends('layouts.common1')

@section('links')


@endsection
@section('content')
    @if(count($customers)>0)
        @foreach($customers as $customer)
<h1>{{$customer->full_name}}</h1>
@endforeach
    @endif
@stop