@extends('admin.master.main')
@section('content')

    @component('admin.components.extras.extra-form-create', ['extras' => $extras]);

    @endcomponent
@endsection
