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
        <div class="row justify-content-center">
            <div class="col col-md-12 col-lg-12 col-sm-12 col-xs-12">

                <p>
                    {!! $pagina->description !!}
                </p>
            </div>
        </div>
    @endif
    <!-- Exemplo cards -->
       <div class="container">
            <div class="row">
                @foreach($packs as $pack)
                    <div class="col-6">
                        <div class="card mx-auto card-price " style="width: 30rem;">
                            <div class="card-body" >
                                <h5 class="card-title">{{$pack->title}}</h5>
                                <p class="card-text">{!!$pack->summary!!}</p>
                                <a href="{{route('user-pack-show',['pack' => $pack->id])}}" id="card-know-more" class="btn btn-primary" > saber mais</a>
                            </div>
                            @if ($pack->image)
                                <img class="card-img-bottom"  src="{{ asset('storage/' . $pack->image) }}" alt="image" style="max-height: 80px">
                            @else
                                <p>No Image</p>
                           @endif
                        </div>
                    </div>
                @endforeach

            </div>
       </div>

    <!-- -->
    <div class="row">
        <div class="col-md-4 col-lg-4 col-xl-4" id="social-links">
            <p>Share the love</p>
            {!! $shareComponent !!}
        </div>
    </div>
</div>
@endsection
