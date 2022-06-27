@extends('admin.master.main')
@section('content')

    @component('admin.components.packs.pack-form-show', ['pack' => $pack]);

    @endcomponent
@endsection
