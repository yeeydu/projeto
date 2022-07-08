
@extends('admin.master.main')
@section('content')

@component('admin.components.faqs.faq-form-edit', ['faq' => $faq]); 

@endcomponent
@endsection