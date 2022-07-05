@extends('admin.master.main')
@section('content')


    @component('admin.components.packs.paks-list', ['packs' => $packs])

    @endcomponent


@endsection
