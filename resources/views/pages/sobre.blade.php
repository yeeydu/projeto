@extends('master.main')
@section('content')

@foreach($paginas as $pagina)
     @if($pagina->title == 'Sobre')
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
          <div id="social-links">
            <p>Share the love</p>
            {!! $shareComponent !!}
         </div>
</div>
    @endif
@endforeach

@endsection