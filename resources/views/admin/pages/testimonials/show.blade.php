
@extends('admin.master.main')
@section('content')

@component('admin.components.testimonials.testimonial-form-show', ['testimonial' => $testimonial]); 

@endcomponent
@endsection