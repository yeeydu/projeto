@extends('admin.master.main')
@section('content')

    @component('admin.components.users.user-form-edit', ['user' => $user]);

    @endcomponent
@endsection
