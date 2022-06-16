
@extends('admin.master.main')
@section('content')

@component('admin.components.paginas.pagina-form-edit', ['pagina' => $pagina]); 

@endcomponent
@endsection