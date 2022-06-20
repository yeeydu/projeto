@extends('admin.master.main')
@section('content')

    @component('admin.components.packs.pack-form-create', ['packs' => $packs]);

    @endcomponent
@endsection
