
@extends('admin.master.main')
@section('content')

@component('admin.components.faqs.faq-form-show', ['faq' => $faq]); 

@endcomponent
@endsection