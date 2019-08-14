@extends('layouts.app')

@section('content')

<form method="post" action="/addmenu">
     {{csrf_field()}}
    <input type="text" name="menu_name">
    <input type="text" name="route">
    <input type="text" name="order">
    <input type="submit" value="SAVE">
</form>
@stop


@section('scripts')


@stop