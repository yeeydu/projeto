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

        <!-- Exemplo cards -->
        <div class="row align-items-stretch">
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card pack-card__price">
                    <img src="http://www.mcmahonchauffeurs.ie/wp-content/uploads/2016/03/wedding.jpg"
                        class="pack-card__image" alt="...">
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
                        {{-- <ul class="card-details">
                                <li>2 Videógrafos</li>
                                <li>Até 18h de cobertura integral do casamento</li>
                                <li>Filme FHD + Filme da Cerimónia</li>
                                <li>Tempo de edição = cerca de 24 semanas após o casamento</li>
                                <li>Box + Pen de Madeira personalizada ou Box Linho + Pen em acrílico personalizada</li>
                                <li>Ficheiros em bruto</li>
                            </ul> --}}
                        <p class="card-price mb-4">
                            800€ (IVA incluído)
                            {{-- <li>Pagamentos em três tranches</li>
                                <li>Reserva do dia: 150€</li>
                                <li>Semana do Casamento: 450€</li>
                                <li>Entrega do trabalho: 200€</li> --}}
                        </p>
                        <button class="btn btn-light pack-card__btn">Ver mais</button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="card pack-card__price">
                    <img src="http://www.mcmahonchauffeurs.ie/wp-content/uploads/2016/03/wedding.jpg"
                        class="pack-card__image" alt="...">
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
                        {{-- <ul class="card-details">
                                <li>2 Videógrafos</li>
                                <li>1 Fotógrafo</li>
                                <li>Áudio Profissional</li>
                                <li>Até 18h de cobertura integral do casamento</li>
                                <li>Filme FHD</li>
                                <li>Tempo de edição = cerca de 24 semanas após o casamento</li>
                                <li>Box + Pen de Madeira personalizada ou Box Linho + Pen em acrílico personalizada,
                                    com todas as fotografias e filmes de casamento</li>
                            </ul> --}}
                        <br>
                        <p class="card-price mb-4">
                            1450€ (IVA incluído)
                            {{-- <li>Pagamentos em três tranches</li>
                                <li>Reserva do dia: 300€</li>
                                <li>Semana do Casamento: 950€</li>
                                <li>Entrega do trabalho: 200€</li> --}}
                        </p>
                        <button class="btn btn-light pack-card__btn mt-4">Ver mais</button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="card pack-card__price">
                    <img src="http://www.mcmahonchauffeurs.ie/wp-content/uploads/2016/03/wedding.jpg"
                        class="pack-card__image" alt="...">
                    <div class="pack-card__title">
                        <h2 class="card-title">Pack Gold</h2>
                    </div>
                    <div class="pack-card__body card-body">
                        <h2 class="card-title">Pack Gold</h2>
                        <p class="card-text">Pack ideal para quem pretende um pack simples e qualidade no registo do dia
                            do casamento, aliado aos nossos álbuns premium.
                        </p>
                        {{-- <ul class="card-details">
                                <li>Álbum Digital Capa Photo ou Linho (tamanho 30x30 com 50 páginas)</li>
                                <li>Box álbum para transporte e proteção</li>
                                <li>2 Videógrafos</li>
                                <li>1 Fotógrafo</li>
                                <li>Áudio Profissional</li>
                                <li>Até 18h de cobertura integral do casamento</li>
                                <li>Filme FHD + Filme de cerimónia</li>
                                <li>Tempo de edição = cerca de 24 semanas após o casamento</li>
                                <li>Box + Pen de Madeira personalizada ou Box Linho + Pen em acrílico personalizada,
                                    com todas as fotografias e filmes do casamento.</li>
                            </ul> --}}
                        <br>
                        <p class="card-price mb-4">
                            1750€ (IVA incluído)
                            {{-- <li>Pagamentos em três tranches</li>
                                <li>Reserva do dia: 350€</li>
                                <li>Semana do Casamento: 1050€</li>
                                <li>Entrega do trabalho: 350€</li> --}}
                        </p>
                        <button class="btn btn-light pack-card__btn mt-4">Ver mais</button>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-3">
                <div class="card pack-card__price">
                    <img src="http://www.mcmahonchauffeurs.ie/wp-content/uploads/2016/03/wedding.jpg"
                        class="pack-card__image" alt="...">
                    <div class="pack-card__title">
                        <h2 class="card-title">Pack Premium</h2>
                    </div>
                    <div class="pack-card__body card-body">
                        <h2 class="card-title">Pack Premium</h2>
                        <p class="card-text">Pack ideal para quem pretende um dia único com “tudo a que tem direito”,
                            com acesso aos nosso álbuns exclusivos e totalmente personalizados.
                        </p>
                        {{-- <ul class="card-details">
                                <li>Álbum Digital Capa Photo, Linho, Madeira ou Vintage (tamanho 35x35 com 50 páginas)</li>
                                <li>Box álbum para proteção e transporte</li>
                                <li>2 Videógrafos</li>
                                <li>2 Fotógrafos</li>
                                <li>Divisão em duas equipas</li>
                                <li>Áudio Profissional</li>
                                <li>Drone</li>
                                <li>Até 18h de cobertura integral do casamento</li>
                                <li>Filme FHD + Filme da cerimónia</li>
                                <li>Sessão de solteiros (fotografia e vídeo)</li>
                                <li>Tempo de edição = cerca de 24 semanas após o casamento</li>
                                <li>Box + Pen de Madeira personalizada ou Box Linho + Pen em acrílico personalizada, com
                                    todas
                                    as fotografias e filmes do casamento.</li>
                            </ul> --}}
                        <br>
                        <p class="card-price mb-4">
                            2500€ (IVA incluído)
                            {{-- <li>Pagamentos em três tranches</li>
                                <li>Reserva do dia: 400€</li>
                                <li>Semana do Casamento: 1800€</li>
                                <li>Entrega do trabalho: 300€</li> --}}
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
