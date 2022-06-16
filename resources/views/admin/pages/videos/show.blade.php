
@extends('admin.master.main')
@section('content')

@component('admin.components.videos.video-form-show', ['video' => $video]); 

@endcomponent
@endsection