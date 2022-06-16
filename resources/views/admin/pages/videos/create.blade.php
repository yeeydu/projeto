
@extends('admin.master.main')
@section('content')

@component('admin.components.videos.video-form-create', ['categorias' => $categorias]);

@endcomponent
@endsection