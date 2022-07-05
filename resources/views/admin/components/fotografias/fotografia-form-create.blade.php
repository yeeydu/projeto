<div id="media" class="col-lg-12 col-lg-offset-2 mx-auto">
    @if (session('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('failed') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <h2>Nova Foto</h2>
    <a href="{{ url('admin/fotografias') }}" class="btn btn-primary">Voltar</a>
        <h1>{{session('totalCat',-1)}}</h1>
    <form id="picCreate" method="POST" action="{{url('admin/fotografias')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" id="title" autocomplete="title" placeholder="Insira um nome para a Foto"
                   class="form-control @error('title') is-invalid @enderror"
                   required value="{{ old('title') }}">
            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea rows="14" type="text"  name="description" id="description" autocomplete="description" placeholder="Escrever a descrição da Fotografia"
                      class="editor form-control @error('description') is-invalid @enderror"
                      value="{{ old('description') }}"  aria-describedby="nameHelp">{{ old('description') }}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            @enderror
        </div>

        <div class="row mt-3 mb-3">
            <div class="order-create col 6"  style="@if(session('totalCat',-1) == -1) visibility: hidden @endif">
                <div class="form-group">
                    <label for="order">Posição (ordem)</label>
                    <select class="form-control @error('order') is-invalid @enderror" id="order" name="order" value="{{ old('order') }}">
                        @if(session('totalCat',-1) == 0)
                            <option>1</option>
                        @else
                            @foreach($fotografias->where('category_id',session('livCat')) as $foto)
                            @if($loop->index < session('totalCat',-1))
                                <option>{{$foto->order}}</option>
                                @if ($loop->last)
                                    <option>{{$foto->order + 1}}</option>
                                @endif
                            @endif
                            @endforeach
                        @endif
                    </select>
                    @error('order')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    @enderror
                </div>
            </div>

            <div class="col 6 ">
                <div class="form-group">
                    <label for="category_id">Categorias</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" id="category_id"  name="category_id">
                            @if(session('totalCat',-1) == -1)
                                <option selected value="{{ old('category_id') }}">Selecionar</option>
                                @foreach($categorias as $categoria)
                                    <option  value="{{$categoria -> id}}">{{$categoria -> title}}</option>
                                @endforeach
                            @else
                                <option selected value="{{ old('category_id') }}">{{session('updCat')->title}}</option>
                            @foreach($categorias as $categoria)
                                    <option  value="{{$categoria -> id}}">{{$categoria -> title}}</option>
                            @endforeach
                            @endif

                        </select>
                        @error('category_id')  <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        @enderror

                </div>

                <input type="hidden" id="create_pic" name="create_pic" value="1">
                <input type="hidden" id="category_change_create" name="category_change_create">
            </div>
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
        <button type="submit" id="btn_Ft_create" class="btn btn-primary show_confirm_create" value="1">Submit</button>
    </form>
</div>
