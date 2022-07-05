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
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card pack-card__price">
                    <img src="./img/pack-cards/ft.jpg" class="pack-card__price-image pack-card__image" alt="Pack Filme">
                    <div class="pack-card__title">
                        <h2 class="card-title">Pack Filme</h2>
                    </div>
                    <div class="pack-card__body card-body">
                        <h2 class="card-title">Pack Filme</h2>
                        <p class="card-text mb-4">O vosso casamento é tão único quanto vocês os dois, então trabalho com
                            os
                            meus casais para criar pacotes individuais que se encaixem perfeitamente. Dito isso, estas
                            opções principais darão-vos um ponto de partida com base nos meus pacotes pré elaborados.
                        </p>
                        <p class="card-price mb-4">
                            800€ (IVA incluído)
                        </p>
                        <button class="btn btn-light pack-card__btn">Ver mais</button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="card pack-card__price">
                    <img src="./img/pack-cards/rf.jpg" class="pack-card__price-image pack-card__image" alt="Pack Silver">
                    <div class="pack-card__title">
                        <div class="text-center">
                            <h2 class="card-title">Pack Silver</h2>
                            <h5 class="card-subtitle mt-2">Sem álbum</h5>
                        </div>
                    </div>
                    <div class="pack-card__body card-body">
                        <h2 class="card-title">Pack Silver</h2>
                        <p class="card-text">Pack ideal para quem não quer gastar muito e mesmo assim pretende qualidade
                            no registo do dia do casamento, este pack prima pela qualidade digital, sem um álbum físico.
                            Mas e se mesmo assim quiserem um álbum digital sem gastar muito?
                            Falem comigo, temos as soluções ideais.
                        </p>
                        <br>
                        <p class="card-price mb-4">
                            1450€ (IVA incluído)
                        </p>
                        <button class="btn btn-light pack-card__btn mt-4">Ver mais</button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="card pack-card__price">
                    <img src="./img/pack-cards/d-n.jpg" class="pack-card__price-image pack-card__image" alt="Pack Gold">
                    <div class="pack-card__title">
                        <h2 class="card-title">Pack Gold</h2>
                    </div>
                    <div class="pack-card__body card-body">
                        <h2 class="card-title">Pack Gold</h2>
                        <p class="card-text">Pack ideal para quem pretende um pack simples e qualidade no registo do dia
                            do casamento, aliado aos nossos álbuns premium.
                        </p>
                        <br>
                        <p class="card-price mb-4">
                            1750€ (IVA incluído)
                        </p>
                        <button class="btn btn-light pack-card__btn mt-4">Ver mais</button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="card pack-card__price">
                    <img src="./img/pack-cards/premium.jpg" class="pack-card__price-image pack-card__image"
                        alt="Pack Premium">
                    <div class="pack-card__title">
                        <h2 class="card-title">Pack Premium</h2>
                    </div>
                    <div class="pack-card__body card-body">
                        <h2 class="card-title">Pack Premium</h2>
                        <p class="card-text">Pack ideal para quem pretende um dia único com “tudo a que tem direito”,
                            com acesso aos nosso álbuns exclusivos e totalmente personalizados.
                        </p>
                        <br>
                        <p class="card-price mb-4">
                            2500€ (IVA incluído)
                        </p>
                        <button class="btn btn-light pack-card__btn mt-4">Ver mais</button>
                    </div>
                </div>

            </div>
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
