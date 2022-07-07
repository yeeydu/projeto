@extends('master.main')
@section('content')
    <section class="container-fluid">
        @if ($pagina != null)
            <div class="row text-center pb-5 ">
                <div class="col col-md-12 col-lg-12 col-sm-12 col-xs-12 pt-4" id="page-image"
                    style="background-image: url('{{ asset('storage/' . $pagina->image) }}'); ">
                    <h1 class="mt-5 pt-5 titleAnimate">{{ $pagina->title }}</h1>
                </div>
            </div>
        @endif
    </section>
    <div class="container-fluid">
        @if ($pagina != null)
            <div class="row justify-content-center">
                <div class="col col-md-12 col-lg-12 col-sm-12 col-xs-12">
                    <p>
                        {!! $pagina->description !!}
                    </p>
                </div>
            </div>
        @endif

        <!-- Pack Cards Price -->
        <div class="row align-items-stretch">
            @foreach($packs as $pack)
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card pack-card__price">
                    @if ($pack->image)
                    <img src="{{ asset('storage/' . $pack->image) }}" class="pack-card__price-image pack-card__image" alt="Pack Filme">
                    @endif
                    
                    <div class="pack-card__title">
                        <h2 class="card-title">{{$pack->title}}</h2>
                    </div>
                    <div class="pack-card__body card-body">
                        <h2 class="card-title">{{$pack->title}}</h2>
                        <p class="card-text mb-4">{!!$pack->summary!!}</p>
                        <p class="card-price mb-4">{{@money($pack->price)}} (IVA incluído)</p>
                        <a href="{{route('user-pack-show',['pack' => $pack->id])}}" class="btn btn-light pack-card__btn">Ver mais</a>
                    </div>
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
