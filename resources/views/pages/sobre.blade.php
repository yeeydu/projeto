@extends('master.main')
@section('content')

    <div class="container-fluid">

            <div class="row text-center pb-5">
                <div class="col text-center mt-5 pt-1" id="page-image" style="background-image: url('{{ asset('storage/' . $pagina->image) }}'); ">

                   <h1 class="mt-5 pt-4" >{{$pagina->title}}</h1>

                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-10">

                        {!! $pagina->description !!}

                </div>
            </div>
            <div class="row">
                <div class="col-10" id="social-links">
                    <p>Share the love</p>
                    {!! $shareComponent !!}
                </div>
            </div>

    </div>


@endsection
