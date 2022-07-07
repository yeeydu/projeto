<div id="media" class="col-lg-12 col-lg-offset-2 mx-auto">
    @if (session('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('failed') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <h2>EDITAR VIDEO</h2>
    <a href="{{ url('admin/videos') }}" class="btn btn-primary">Voltar</a>
  
    <form id="videoEdit" method="POST" action="{{url('admin/videos/'. $video->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" id="title" required value="{{old('title',$video->title) }}"
                   class="form-control @error('title') is-invalid @enderror">

            @error('title')
          class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea rows="14" type="text"  name="description" id="description"
                      class="editor form-control @error('description') is-invalid @enderror"
                      aria-describedby="nameHelp">{{old('description',$video->description) }}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            @enderror
        </div>

        <div class="row mt-3 mb-3">
            <div class="col 6" >
                <div class="form-group">
                    <label for="order">Posição (ordem)</label>
                    <select class="form-control @error('order') is-invalid @enderror" id="order" name="order" required >

                        @if(session('totalCat',-1) != -1)
                            @if(session('totalCat',-1) == 0)
                                <option>1</option>
                            @else
                            @foreach($videos->where('category_id',session('livCat')) as $otherVid)
                                @if($loop->index <= session('totalCat'))
                                    <option>{{$otherVid->order}}</option>
                                @endif
                                @if($loop->last && session('totalCat',-1) > 0)
                                        <option>{{$otherVid->order + 1 }}</option>
                                    @endif
                            @endforeach
                            @endif
                        @else
                            <option selected >{{$video->order}}</option>
                            @foreach($videos->where('category_id',$video->category->id) as $otherVid)
                                @if($loop->index <= $orderCount && $otherVid->order != $video->order)
                                    <option>{{$otherVid->order}}</option>
                                @endif
                            @endforeach
                        @endif

                    </select>

                    @error('order')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    @enderror
                </div>
                <input type="hidden" id="lastOrder" name="lastOrder" value="{{$video->order}}">
                <input type="hidden" id="pic_id" name="pic_id" value="{{$video->id}}">
                <input type="hidden" id="category_change" name="category_change">
                <input type="hidden" id="edit_vid" name="edit_vid" value="1">
            </div>

            <div class="col 6 ">
                <div class="form-group">
                    <label for="category_id">Categorias</label>
                    <div class="input-group">
                        <select id="category_id"  name="category_id"
                                class="form-control @error('category_id')  is-invalid @enderror" >
                            @if(old('category_id') == $video->category->id)

                            <option selected value="{{$video->category->id}}">{{$video->category->title}}</option>
                            @else
                                <option value="{{$video->category->id}}">{{$video->category->title}}</option>
                            @endif
                            @foreach($categorias as $categoria)

                                @if( $categoria -> title != $video-> category->title)
                                    @if(old('category_id') == $categoria -> id)
                                            <option selected  value="{{$categoria -> id}}">{{$categoria->title}}</option>
                                        @else
                                            <option value="{{$categoria -> id}}">{{$categoria->title}}</option>
                                    @endif
                                @endif

                            @endforeach

                        </select>
                        @error('category_id')  <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <input type="hidden" id="lastCategory" name="lastCategory" value="{{$video-> category->id}}">
            </div>
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Link</label>
            <input type="text" name="url" id="url" autocomplete="url" placeholder="Type url" class="form-control @error('url')
                    is-invalid
                @enderror" value="{{ $video->url }}" required aria-describedby="nameHelp">
            @error('url') <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div>
        <div class="pb-3 w-50">
            <x-embed url="{{ $video->url }}" />
        </div>

        <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" switch="bool" @if ($video->is_active ==true) checked @endif value="{{$video->is_active}}">
                <label class="custom-control-label" for="is_active">Estado Publicação</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary show_confirm_edit">Submit</button>
    </form>
</div>