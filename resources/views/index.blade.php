@extends('master.main')
@section('content')
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
  @foreach($sliders as $slide)
  <li data-target="#carouselExampleCaptions" data-slide-to="{{$loop->index}}" class="@if($loop->first) active @endif"></li>
  @endforeach
  </ol>
  <div class="carousel-inner">
    @foreach($sliders as $slide)
  <div class="carousel-item @if($loop->first) active @endif" >
      <img src="{{ asset('storage/' . $slide->image) }}" class="d-block w-100" alt="diogo-pinto carousel image">
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
<div class="w-100 p-3" style="background-color: #eee;">Content
  <div class="img-fluid w-50">
        <img src="https://images.pexels.com/photos/1024993/pexels-photo-1024993.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260" class="img-fluid" alt="...">
  </div>

  <div id="social-links">
            <p>Share the love</p>
            {!! $shareComponent !!}
         </div>
</div>
@endsection