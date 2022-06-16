
@extends('admin.master.main')
@section('content')

@component('admin.components.fotografias.fotografia-form-show', ['fotografia' => $fotografia]); 

@endcomponent
@endsection