<div id="media" class="col-lg-12 col-lg-offset-2 mx-auto">
    @if (session('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('failed') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <h2>Novo Pack</h2>
    <a href="{{route('packs.index') }}" class="btn btn-primary">Voltar</a>
    <form method="POST" action="{{route('pack.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Nome do Pack</label>
            <input type="text" name="title" id="title" autocomplete="title" placeholder="Insira o nome do pack"
                   class="form-control @error('title') is-invalid @enderror"
                   required value="{{ old('title') }}">
            @error('title')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="summary">Resumo</label>
            <textarea rows="14" type="text"  name="summary" id="summary" autocomplete="summary" placeholder="Escrever o resumo do pack"
                      class="editor form-control @error('summary') is-invalid @enderror"
                      value="{{ old('summary') }}" aria-describedby="nameHelp">{{ old('summary') }}</textarea>
            @error('summary')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea rows="14" type="text"  name="description" id="description" autocomplete="description" placeholder="Escrever a descrição do pack"
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

                @if($packs->isEmpty())
                    <option>1</option>
                @else
                    @foreach($packs as $pack)
                        <option>{{$pack->order}}</option>
                        @if ($loop->last)
                            <option>{{$pack->order + 1}}</option>
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
            <input type="number" step="0.01" name="price" id="price" autocomplete="price" placeholder="Insira o valor do pack"
                   class="form-control @error('price') is-invalid @enderror"
                   required value="{{ old('price') }}">
            @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group"> <!-----image----->
            <label for="image">Image</label>
            <!---- filenames[]----->
            <input type="file"  name="image" id="image"
                   class="form-control @error('image') is-invalid @enderror"
                   value="{{ old('image') }}"  aria-describedby="nameHelp">
            @error('image')
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
