@extends('master.main')
@section('content')
<section class="container-fluid">
    @if($pagina != null)
   
        <div class="row text-center pb-5  " >
            <div class="col col-md-12 col-lg-12 col-sm-12 col-xs-12 pt-4" id="page-image" style="background-image: url('{{ asset('storage/' . $pagina->image) }}'); ">
               <h1 class="mt-5 pt-5 titleAnimate" >{{$pagina->title}}</h1>
            </div> 
        </div>
</section>   
<div class="container">
<div class="row justify-content-center  mt-3 mb-2 siteText">
            <div class="col col-md-12 col-lg-12 col-sm-12 col-xs-12">
                <p>
                    {!! $pagina->description !!}
                </p>
            </div>
        </div>
        @endif
    <div class="row pt-3 col-lg-12 col-md-12 col-sm-12 col-xs-12">
      @foreach($videos as $video)
      <div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12">
          <div class="text-center">
               <h2>{{$video->title}}</h2>
          </div>
          <div class="video" >
               <x-embed url="{{ $video->url }}" />
          </div>
          <div class="text-justify mb-5">
               <p>{!! $video->description !!}</p>
          </div>
        </div>
      @endforeach
     </div>
  <!--- Social share -->
    <div class="row">
        <div class="col-md-4 col-lg-4 col-xl-4" id="social-links">
            <p>Share the love</p>
            {!! $shareComponent !!}
        </div>
    </div>
</div>

@endsection
