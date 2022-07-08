@extends('admin.master.main')
@section('content')

    @component('admin.components.users.user-form-show', ['user' => $user]);

    @endcomponent
@endsection
