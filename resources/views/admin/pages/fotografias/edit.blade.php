
@extends('admin.master.main')
@section('content')

@component('admin.components.fotografias.fotografia-form-edit', ['fotografia'  => $fotografia,
                                                                 'orderCount' => $orderCount,
                                                                 'categorias'  => $categorias,
                                                                 'fotografias' => $fotografias]);

@endcomponent
@endsection
