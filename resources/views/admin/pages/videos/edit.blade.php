
@extends('admin.master.main')
@section('content')

@component('admin.components.videos.video-form-edit', ['video' => $video, 'categorias' => $categorias]); 

@endcomponent
@endsection