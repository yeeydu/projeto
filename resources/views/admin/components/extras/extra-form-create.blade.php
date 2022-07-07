<div id="media" class="col-lg-12 col-lg-offset-2 mx-auto">
    @if (session('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('failed') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <h2>Novo Extras</h2>
    <a href="{{route('extras.index') }}" class="btn btn-primary">Voltar</a>
    <form method="POST" action="{{route('extra.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Nome do Extra</label>
            <input type="text" name="name" id="name" autocomplete="name" placeholder="Insira o nome do Extra"
                   class="form-control @error('name') is-invalid @enderror"
                   required value="{{ old('name') }}">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Descrição do extra(p.ex: drone("Descrição do extra")</label>
            <textarea rows="14" type="text"  name="description" id="description" autocomplete="description" placeholder="Escrever a descrição do extra"
                      class="editor form-control @error('description') is-invalid @enderror"
                      value="{{ old('description') }}"  aria-describedby="nameHelp">{{ old('description') }}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="order">Posição (ordem)</label>
            <select class="form-control @error('order') is-invalid @enderror" id="order" name="order" required value="{{ old('order') }}">
                <option selected value="{{ old('order') }}">Selecionar</option>

                @if($extras->isEmpty())
                    <option>1</option>
                @else
                    @foreach($extras as $extra)
                        <option>{{$extra->order}}</option>
                        @if ($loop->last)
                            <option>{{$extra->order + 1}}</option>
                        @endif
                    @endforeach
                @endif
            </select>
            @error('order')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="price">Preço</label>
            <input type="number" step="0.01" name="price" id="price" autocomplete="price" placeholder="Insira o valor do extra"
                   class="form-control @error('price') is-invalid @enderror"
                   required value="{{ old('price') }}">
            @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group">
            <label for="price_description">Descrição deo preço (p.ex 200€(Descrição deo preço))</label>
            <input type="text" name="price_description" id="price_description" autocomplete="price_description" placeholder="Escrever a descrição do preço"
                   class="form-control @error('price_description') is-invalid @enderror"
                   value="{{ old('price_description') }}">
            @error('price_description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" switch="bool">
            <label class="custom-control-label" for="is_active">Publicar</label>
        </div>
        <button type="submit" class="btn btn-primary show_confirm_create">Submit</button>
    </form>
</div>
