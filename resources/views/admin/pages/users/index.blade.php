@extends('admin.master.main')
@section('content')


    @component('admin.components.users.users-list', ['users' => $users])

    @endcomponent


@endsection
