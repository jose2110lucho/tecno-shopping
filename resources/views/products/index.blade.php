@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 style="text-align: center"><strong>Lista De Productos</strong></h1>
@stop

@section('content')


    @livewire('product')

@stop


