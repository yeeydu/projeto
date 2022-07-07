@extends('admin.master.main')
@section('content')

    @component('admin.components.extras.extras-list', ['extras' => $extras])

    @endcomponent


@endsection
