
@extends('admin.master.main')
@section('content')

@component('admin.components.videos.video-form-edit', ['video' => $video, 'orderCount' => $orderCount, 'categorias' => $categorias, 'videos' => $videos]); 

@endcomponent
@endsection