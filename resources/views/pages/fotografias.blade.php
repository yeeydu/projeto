@extends('master.main')
@section('content')

@foreach($paginas as $pagina)
     @if($pagina->title == 'Fotografias')
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
@endforeach
    <div class="row pt-3 col-lg-12 col-md-12 col-sm-12">
        @foreach($fotografias as $foto)
        <div class="col col-lg-6 col-md-6 col-sm-12 col-xs-12">  
            <div class="pb-2"> <!----->
            @if ($foto->image)
            <img class="w-100" src="{{ asset('storage/' . $foto->image) }}" alt="image"></td>
            @else
            <p>No Image</p>  
            @endif
        </div> <!----->
         <div class="text-center mb-5">
            <h2>{{$foto->title}}</h2>
            <p>{!! $foto->description !!}</p>
         </div>
        </div>
        @endforeach
    </div>
    <br>
    <div id="social-links">
            <p>Share the love</p>
            {!! $shareComponent !!}
         </div>
</div>



@endsection