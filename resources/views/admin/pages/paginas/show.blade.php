
@extends('admin.master.main')
@section('content')

@component('admin.components.paginas.pagina-form-show', ['paginas' => $paginas]); 

@endcomponent
@endsection