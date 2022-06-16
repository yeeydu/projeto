
@extends('admin.master.main')
@section('content')

@component('admin.components.fotografias.fotografia-form-edit', ['fotografia' => $fotografia, 'categorias' => $categorias]); 

@endcomponent
@endsection