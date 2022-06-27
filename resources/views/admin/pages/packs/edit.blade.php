@extends('admin.master.main')
@section('content')

    @component('admin.components.packs.pack-form-edit', ['pack' => $pack, 'packs'=>$packs]);

    @endcomponent
@endsection
