@extends('layouts.app')
@section('title')
    {{ $title}}
@endsection
{{-- @section('breadcrums')
    {{ Breadcrumbs::render('home') }}
@endsection --}}
@section('content')
        {{-- {{Auth::user()->getEntidadId()}} {{$formulario}} {{$entidad}} --}}
       {{-- <executions-component :alerts="{{$alerts}}"></executions-component> --}}
    <plan-component :formulario="{{json_encode($formulario)}}" :entidad="{{json_encode($entidad)}}" />

@endsection
