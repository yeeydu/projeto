@extends('admin.master.main')
@section('content')

@component('admin.components.paginas.paginas-list', ['paginas' => $paginas])

@endcomponent
@endsection


