
<div id="media" class="col-lg-12 col-lg-offset-2 mx-auto">
@if (session('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('failed') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <h2>Adicionar Video</h2>
    <a href="{{ url('admin/videos') }}" class="btn btn-primary">Back</a>
    <form  id="videoCreate" method="POST" action="{{url('admin/videos')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputPassword1">Titulo</label>
            <input type="text" name="title" id="title" autocomplete="title" placeholder="Type title" class="form-control @error('title')
                    is-invalid
                @enderror" value="{{ old('title') }}" required aria-describedby="nameHelp">
            @error('title') <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div>
        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea rows="14" type="text"  name="description" id="description" autocomplete="description" placeholder="Escrever a descrição do video"
                      class="editor form-control @error('description') is-invalid @enderror"
                      value="{{ old('description') }}"  aria-describedby="nameHelp">{{ old('description') }}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            @enderror
        </div>

        <div class="row mt-3 mb-3">
            <div class="order-create col 6"  style="@if (session('totalCat',-1) == -1) visibility: hidden @endif">
                <div class="form-group">
                    <label for="order">Posição (ordem)</label>
                    <select class="form-control @error('order') is-invalid @enderror" id="order" name="order" value="{{ old('order') }}">
                        @if(session('totalCat',-1) == 0)
                            <option>1</option>
                        @else
                            @foreach($videos->where('category_id',session('livCat')) as $video)
                            @if($loop->index < session('totalCat',-1))
                                <option>{{$video->order}}</option>
                                @if ($loop->last)
                                    <option>{{$video->order + 1}}</option>
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
                <input type="hidden" id="create_video" name="create_video" value="1">
                <input type="hidden" id="category_change_vid_create" name="category_change_vid_create">
            </div>
        </div>

    <div class="form-group">
            <label for="exampleInputPassword1">Link</label>
            <input type="text" name="url" id="url" autocomplete="url" placeholder="Type url" class="form-control @error('url')
                    is-invalid
                @enderror" value="{{ old('url') }}" required aria-describedby="nameHelp">
            @error('url') <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div>
    <!---    <div class="form-group"> ----image----
            <label for="exampleInputPassword1">Image</label>
            ---- filenames[]-----
            <input type="file"  name="image" id="image"
            class="form-control @error('name')
                    is-invalid
                @enderror"
            value="{{ old('image') }}"  aria-describedby="nameHelp">
            @error('image')  <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            @enderror
        </div> ------------->
            <div>
                <span class="invalid-feedback" role="alert"></span>
            </div>

        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" switch="bool">
            <label class="custom-control-label" for="is_active">Publicar</label>
        </div>
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
