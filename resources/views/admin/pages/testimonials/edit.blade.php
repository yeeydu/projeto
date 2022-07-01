
@extends('admin.master.main')
@section('content')

@component('admin.components.testimonials.testimonial-form-edit', ['testimonial' => $testimonial]); 

@endcomponent
@endsection