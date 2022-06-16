@extends('admin.master.main')
@section('content')
 
<div class="container">
  <div class="row">
<div class="col">
        <div class="col-md-10 col-md-offset-1">
       <!---       <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="card-body">
                    @if (session('status'))
                       <div class="alert alert-success" role="alert">   
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div>  ---->
         </div>
         <div> <!--- Sliders Component--->
        @component('admin.components.sliders.sliders-list',['sliders' => $sliders] ) 
        @endcomponent
        </div>
   </div>  
</div>
</div>
@endsection

