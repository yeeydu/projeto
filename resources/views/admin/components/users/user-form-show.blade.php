<div id="media" class="col-lg-12 col-lg-offset-2 mx-auto">
    <div class="row">
        <div class="col">
            <h2>{{$user->name}}</h2>
            <a href="{{route('users.index') }}" class="btn btn-primary">Voltar</a>
        </div>
    </div>

    <form>
        @csrf
        <div class="form-group">
            <label for="title">Nome</label>
            <input type="text" name="title" id="title" autocomplete="title" class="form-control" disabled value="{{$user->name}}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" autocomplete="email" class="form-control" disabled value="{{$user->email}}">
        </div>

        <div class="form-group">
            <label for="mobile_number">Telemóvel</label>
            <input type="text" name="mobile_number" id="mobile_number" autocomplete="mobile_number" class="form-control" disabled value="{{$user->mobile_number}}">
        </div>

        <div class="form-group">
            <label for="address">Morada</label>
            <input type="text" name="address" id="address" autocomplete="address" class="form-control" disabled value="{{$user->address}}">
        </div>

        <div class="form-group">
            <label for="quote_request_email">Email para recepção dos pedidos</label>
            <input type="text" name="quote_request_email" id="quote_request_email" autocomplete="quote_request_email" class="form-control" disabled value="{{$user->quote_request_email}}">
        </div>

        <span>Estado</span>
        <div class="show-style @if(auth()->user()->id == $user->id) text-success @else text-danger @endif">
            <i class="fa-solid fa-user"></i>
        </div>

        <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="quote_request_is_active" name="is_active" disabled switch="bool" @if ($user->quote_request_is_active ==true) checked @endif value="{{$user->quote_request_is_active}}">
                <label class="custom-control-label" for="quote_request_is_active">@if ($user->quote_request_is_active ==true) Email Ativo @else Email Inactivo @endif</label>
            </div>
        </div>

    </form>
</div>
