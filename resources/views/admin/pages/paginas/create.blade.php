
@extends('admin.master.main')
@section('content')

@component('admin.components.paginas.pagina-form-create', ['paginas' => $paginas]);

@endcomponent
@endsection