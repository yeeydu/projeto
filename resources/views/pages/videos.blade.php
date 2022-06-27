@extends('master.main')
@section('content')
<div class="container-fluid">
@if($pagina != null)
    <div class="row text-center pb-5">
        <div class="row" id="page-image" style="background-image: url('{{ asset('storage/' . $pagina->image) }}');">
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
        @endif

  <div class="row pt-3 col-lg-12 col-md-12 col-sm-12">
      @foreach($videos as $video)
    <div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12">   
          <div class="text-center">
               <h2>{{$video->title}}</h2>
          </div>
          <div class="pb-3">
               <x-embed url="{{ $video->url }}" />
          </div> 
          <div class="text-justify mb-5">
               <p>{!!$video->description !!}</p>
          </div>
        </div>
      @endforeach
     </div>
    </div>
    <section class="container">
        <div class="col-md-4 col-lg-4 col-xl-4" id="social-links">
            <p>Share the love</p>
            {!! $shareComponent !!}
        </div>
    </section>
</div>

@endsection