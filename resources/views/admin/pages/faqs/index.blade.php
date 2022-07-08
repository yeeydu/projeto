@extends('admin.master.main')
@section('content')

@component('admin.components.faqs.faqs-list', ['faqs' => $faqs])

@endcomponent
@endsection


