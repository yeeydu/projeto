@extends('master.main')
@section('content')
    <section class="container-fluid">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
            <div class="row text-center pb-5  " >
                <div class="col col-md-12 col-lg-12 col-sm-12 col-xs-12 pt-4" id="page-image" style="background-image: url('{{ asset('storage/' . $pack->image) }}'); ">
                    <h1 class="mt-5 pt-5 titleAnimate" >{{$pack->title}}</h1>
                </div>
            </div>
    </section>
<div class="container pack-show mb-4">

    <div class="row justify-content-center mt-1 mb-4">
        <div class="col col-md-10 col-lg-8 ">
            <h1 class="titlePackUL text-center">{{$pack->title}}</h1>
        </div>
    </div>
    <div class="row justify-content-center mt-1">
        <div class="col col-md-10 col-lg-8">
           {!! $pack->summary !!}
        </div>
    </div>

    <div class="row justify-content-center mt-1">
        <div class="col col-md-10 col-lg-8">

            <div class="pack-description">
                {!! $pack->description !!}
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col col-md-10 col-lg-8">
            <h4>Valor: {{@money($pack->price)}}</h4>
        </div>
    </div>

    <div class="row justify-content-center mt-3">
        <div class="col col-md-10 col-lg-8">
            <p>Se desejar pode incluir os extras abaixo listados. Caso pretenda este Pack preencha o formulário abaixo.</p>
        </div>
    </div>

    <div class="row justify-content-center mt-1">
        <div class="col col-md-10 col-lg-8 ">
            <h3 class="text-center mb-3 mt-3 contactTitle">Faça o seu pedido!</h3>
            <form id="formSubmitPack" method="post" enctype="multipart/form-data" action="{{route('pack.submit')}}">
                @csrf
                @method('POST')
                <div class="form-group pack-description">
                    <label><H4>Extras</H4></label><br>
                    @foreach($extras as $extra)
                    <label style='display:inline;'><input type="checkbox" name="extra[]" class="sum" value="{{$extra}}"> {{$extra->name}} @if($extra->description != null)({!!preg_replace ('/<[^>]*>/', ' ', $extra->description)!!})@endif - {{$extra->price}}€ @if($extra->price_description != null)({{$extra->price_description}})@endif</label>
                        <br>
                    @endforeach
                </div>

                <input type="hidden" id="packValue" name="packValue" value="{{$pack->price}}">
                <input type="hidden" id="packName" name="packName" value="{{$pack->title}}">
                <div class="row">
                    <div class="col">
                        <h4 >Total: <span id="total_sum_value">{{$pack->price}}</span>€</h4>
                    </div>
                </div>
                <input type="hidden" id="total_price" name="total_price" value="{{$pack->price}}">
                <div class="form-group">
                    <label for="name" id="name" class="form-label">Nome</label>
                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Escreva o seu nome" required value="{{ old('name') }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" id="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control  @error('email') is-invalid @enderror" placeholder="Insira o seu email" required value="{{ old('email') }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone" id="phone" class="form-label">Nº Telemóvel</label>
                    <input type="number" name="phone" id="phone" class="form-control  @error('phone') is-invalid @enderror" placeholder="Número de telemóvel" required value="{{ old('phone') }}">
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="msg" id="msg" class="form-label">Local do evento</label>
                    <textarea name="msg" id="msg" class="form-control  @error('msg') is-invalid @enderror" placeholder="Indique o local do evento" required value="{{ old('msg') }}">{{ old('msg') }}</textarea>
                    @error('msg')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="name" id="datLabel" class="form-label">Data Evento</label>
                    <input type="date" name="date" id="datePic" class="form-control @error('date') is-invalid @enderror" required value="{{ old('date') }}">
                    @error('date')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                    <span id="errorDate" class="text-danger"></span>
                </div>
                <input type="hidden" id="alternate" />

                <div class="row pt-3">
                    <div class="col text-center">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>
    <!--- Social share -->
    <div class="row ml-5 pl-5">
           <div class="col-md-4 col-lg-4 col-xl-4" id="social-links">
               <p>Share the love</p>
               {!! $shareComponent !!}
           </div>
       </div>

@endsection
