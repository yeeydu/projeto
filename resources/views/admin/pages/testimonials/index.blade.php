@extends('admin.master.main')
@section('content')

@component('admin.components.testimonials.testimonials-list', ['testimonials' => $testimonials])

@endcomponent
@endsection


