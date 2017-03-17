@extends('layouts.dashboard')

@section('content')

@foreach($ordenes as $orden)
    <option value="{{$orden->nombre}}">{{$orden->nombre}}</option>
    @endforeach
@stop


