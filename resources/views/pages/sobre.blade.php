@extends('master.main')
@section('content')

<<<<<<< HEAD
@foreach($paginas as $pagina)
     @if($pagina->title == 'Sobre')
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
    @endif
@endforeach
=======
<div class="container-fluid">
@if($pagina != null)
    <div class="row text-center pb-5">
        <div class="row" id="page-image" style="background-image: url('{{ asset('storage/' . $pagina->image) }}'); ">
            <div class="col text-center mt-5 pt-1">
               <h1 class="mt-5 pt-4" >{{$pagina->title}}</h1>
            </div> 
        </div>
    </div>
<div class="container mt-3 mb-5">
        <div class="row justify-content-center">
            <div class="col col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <p>
                    {!! $pagina->description !!}
                </p>
            </div>
        </div>
    </div>
    @endif
</div>
<section class="container">
        <div class="col-md-4 col-lg-4 col-xl-4" id="social-links">
            <p>Share the love</p>
            {!! $shareComponent !!}
        </div>
    </section>
>>>>>>> 9a6558fb3a98f18bffd8da3fa602a986d36fa732

@endsection
