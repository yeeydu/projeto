<div id="media" class="col-lg-12 col-lg-offset-2 mx-auto">
    @if (session('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('failed') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <h2>EDITAR - {{$user->name}}</h2>
    <a href="{{route('users.index') }}" class="btn btn-primary">Voltar</a>
    <form method="POST" action="{{route('user.update',['user' => $user->id])}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" required value="{{$user->name}}"
                   class="form-control @error('name') is-invalid @enderror">

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required value="{{$user->email}}"
                   class="form-control @error('email') is-invalid @enderror">

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="mobile_number">Telemóvel</label>
            <input type="number" name="mobile_number" id="mobile_number" required value="{{$user->mobile_number}}"
                   class="form-control @error('mobile_number') is-invalid @enderror">

            @error('mobile_number')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="address">Morada</label>
            <textarea rows="14" type="text"  name="address" id="address"
                      class="form-control @error('address') is-invalid @enderror"
                      aria-describedby="nameHelp">{{$user->address}}</textarea>
            @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="quote_request_email">Email para recepção dos pedidos</label>
            <input type="email" name="quote_request_email" id="quote_request_email" required value="{{$user->quote_request_email}}"
                   class="form-control @error('quote_request_email') is-invalid @enderror">

            @error('quote_request_email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="quote_request_is_active" name="quote_request_is_active" switch="bool" @if ($user->quote_request_is_active ==true) checked @endif value="{{$user->quote_request_is_active}}">
                <label class="custom-control-label" for="quote_request_is_active">Estado Email</label>
            </div>
        </div>
        <div class="row">
            <div class="col-1 align-content-end">
                <button type="submit" class="btn btn-primary show_confirm_edit">Submit</button>
            </div>
            <div class="col-2 align-content-end">
                @if (Route::has('password.request'))
                    <a class="btn btn-primary " href="{{ route('password.request') }}">
                        Alterar Password
                    </a>
                @endif
            </div>
        </div>


    </form>



</div>
