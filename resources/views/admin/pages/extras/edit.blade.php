@extends('admin.master.main')
@section('content')

    @component('admin.components.extras.extra-form-edit', ['extra' => $extra, 'extras'=>$extras]);

    @endcomponent
@endsection
