@extends('admin.master.main')
@section('content')

    @component('admin.components.extras.extra-form-show', ['extra' => $extra]);

    @endcomponent
@endsection
