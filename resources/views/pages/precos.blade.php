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
                <div class="col-6">
                    <div class="card mx-auto card-price " style="width: 30rem;">
                        <div class="card-body" onmouseover="showText();" onmouseout="reset();" >
                            <h5 class="card-title">Pack Filme</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" id="card-know-more" class="btn btn-primary" style="display: none"></a>
                        </div>
                        <img src="http://www.mcmahonchauffeurs.ie/wp-content/uploads/2016/03/wedding.jpg" class="card-img-bottom" alt="...">
                    </div>
                </div>

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
