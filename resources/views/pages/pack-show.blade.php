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
        <div id="media" class="col-lg-12 col-lg-offset-2 mx-auto">
            <div class="row">
                <div class="col">
                    <h2>{{$pack->title}}</h2>
                    <a href="{{route('precos') }}" class="btn btn-primary">Voltar</a>
                </div>
            </div>

            <form>
                @csrf
                <div class="form-group">
                    <label for="title">Nome do Pack</label>
                    <input type="text" name="title" id="title" autocomplete="title" class="form-control" disabled value="{{$pack->title}}">
                </div>

                <span>Resumo</span>
                <div class="show-style">
                    {!!$pack->summary!!}
                </div>

                <span>Descrição</span>
                <div class="show-style">
                    {!!$pack->description!!}
                </div>

                <div class="form-group">
                    <label for="exampleFormControlSelect1">Posição (ordem)</label>
                    <div class="form-control" style="background-color: #e9ecef;">
                        {!!$pack->order!!}
                    </div>
                </div>

                <div class="form-group">
                    <label for="price">Preço do Pack</label>
                    <input type="number" step="0.01" name="price" id="price" autocomplete="price" class="form-control" disabled value="{{$pack->price}}">
                </div>
                <div class="form-group">
                    <label for="summary">Imagem</label>
                    <div class="w-50 mx-auto"> <!----->
                        @if ($pack->image)
                            <img class="img-thumbnail" src="{{ asset('storage/' . $pack->image) }}" alt="image"></td>
                        @else
                            <p>No Image</p>
                        @endif
                    </div>
                </div>

            </form>
        </div>
@endsection
