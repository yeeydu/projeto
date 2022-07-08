@extends('master.main')
@section('content')
    @if ($sliders->isNotEmpty())
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($sliders as $slide)
                    <li data-target="#carouselExampleCaptions" data-slide-to="{{ $loop->index }}"
                        class="@if ($loop->first) active @endif"></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach ($sliders as $slide)
                    <div class="carousel-item @if ($loop->first) active @endif">
                        <img src="{{ asset('storage/' . $slide->image) }}" class="d-block w-100"
                            alt="diogo-pinto carousel image">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $slide->title }}</h5>
                            <p>{!! $slide->description !!}.</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleCaptions" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleCaptions" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </button>
        </div>
    @endif
    <div class="container-fluid ">

        <!--- Photos  -->
        @if ($fotografias->isNotEmpty())
            <div class="row mb-5 mt-5 text-center pt-4 pb-4">
                @foreach ($fotografias as $foto)
                    <div class="col-lg-4 col-md-4 col-sm-6 pb-2">
                        <div class="pb-2 mt-2 mb-2">
                            @if ($foto->image)
                                <a href="/fotografias">
                                    <img class="w-100 imgHome" src="{{ asset('storage/' . $foto->image) }}"
                                        alt="image">
                                </a>
                            @else
                                <p>No Image</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        <!--- Pack Card Services -->
        <div class="container-fluid  pack-card__service_bg mx-auto px-auto my-3 py-3">
            <div class="row justify-content-center ">
                <div class="col-md-4 col-lg-4 col-xl-4 text-center">
                    <h2>Serviços</h2>
                </div>
            </div>
            <div class="w-100 p-3 pack-card__service">
                <div class="row align-items-stretch">
                    <div class="col-12 col-md-6 col-lg-3">
                        @component('components.pack-card',
                            [
                                'title' => 'Fotografias',
                                'image' => './img/pack-cards/dp1.jpg',
                                'url' => '/fotografias',
                            ])
                        @endcomponent
                    </div>

                    <div class="col-12 col-md-6 col-lg-3">
                        @component('components.pack-card',
                            [
                                'title' => 'Filmes',
                                'image' => './img/pack-cards/l-j.jpg',
                                'url' => '/videos',
                            ])
                        @endcomponent
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        @component('components.pack-card',
                            [
                                'title' => 'Corporate',
                                'image' => './img/pack-cards/dp.jpg',
                                'url' => '/corporate',
                            ])
                        @endcomponent
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        @component('components.pack-card',
                            [
                                'title' => 'Preços',
                                'image' => './img/pack-cards/l-j2.jpg',
                                'url' => '/precos',
                            ])
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>

        <!--- Testimonials -->
        <div class="row justify-content-center m-3">
            <div class="col-md-4 col-lg-4 col-xl-4 text-center">
                <h2>Testemunhos</h2>
            </div>
        </div>
        @if ($testimonials->isNotEmpty())
        
            <div id="testimonial" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner ">
                    @foreach ($testimonials as $testimonial)
                        <div class="carousel-item test-item @if ($loop->first) active @endif">
                            <blockquote class="blockquote text-center pl-3 pr-3">
                                <p class="mb-0">{!! $testimonial->description !!}</p>
                                <footer class="blockquote-footer">{{ $testimonial->name }} <cite
                                        title="Source Title">...</cite>
                                </footer>
                            </blockquote>
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-target="#testimonial" data-slide="prev">
                    <span class="carousel-control-prev-icon tprev" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-target="#testimonial" data-slide="next">
                    <span class="carousel-control-next-icon tnext" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </button>
            </div>
        @endif

        <!--- Social share -->
        <div class="row justify-content-center">
            <div class="col-md-4 col-lg-4 col-xl-4 text-center" id="social-links">
                <p>Share the love</p>
                {!! $shareComponent !!}
            </div>
        </div>
    </div>
@endsection
