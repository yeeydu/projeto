@extends('admin.master.main')
@section('content')

@component('admin.components.videos.videos-list', ['videos' => $videos])

@endcomponent
@endsection


