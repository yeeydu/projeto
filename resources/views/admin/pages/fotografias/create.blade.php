
@extends('admin.master.main')
@section('content')

@component('admin.components.fotografias.fotografia-form-create', ['categorias' => $categorias, 'fotografias' => $fotografias]);

@endcomponent
@endsection
