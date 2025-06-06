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

        @endif
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    <div class="container pack-show mb-4">
            <div class="row justify-content-center mt-1">
                <div class="col col-md-10 col-lg-8">
                    <h3 class="text-center mb-3 contactTitle">Contacte-nos</h3>
                    <form method="post" enctype="multipart/form-data" action="{{route('contact.submit')}}">
                        @csrf
                        @method('POST')
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
                            <label for="msg" id="msg" class="form-label">Menssagem</label>
                            <textarea name="msg" id="msg" class="form-control  @error('msg') is-invalid @enderror" placeholder="Deixe nos a sua menssagem!" required value="{{ old('msg') }}">{{ old('msg') }}</textarea>
                            @error('msg')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="row pt-3">
                            <div class="col text-center">
                                <input type="submit" class="btn btn-dark " value="Submit">
                            </div>

                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row justify-content-center mt-5 ">
                <div class="col-md-10 col-lg-8">
                    <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48046.937100940806!2d-8.190570360101571!3d41.17961612044397!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2497c7cf5a2aef%3A0x5d25f358cbfb056f!2sMarco%20de%20Canaveses!5e0!3m2!1spt-PT!2spt!4v1654044940176!5m2!1spt-PT!2spt"
                    width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                @if($pagina != null)
                <div class="col-12 col-lg-4 my-auto">
                    
                    {!! $pagina->description !!}
                </div>
                @endif
            </div>
            <!--- Social share -->
            <div class="row mt-5  ">
                <div class="col-md-4 col-lg-4 col-xl-4" id="social-links">
                    <p>Share the love</p>
                    {!! $shareComponent !!}
                </div>
            </div>
        </div>
@endsection
