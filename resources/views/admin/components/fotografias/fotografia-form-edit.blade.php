<div id="media" class="col-lg-12 col-lg-offset-2 mx-auto">
    @if (session('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('failed') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <h2>EDITAR FOTO</h2>
    <a href="{{ url('admin/fotografias') }}" class="btn btn-primary">Voltar</a>
        <h1>{{session('totalCat',-1)}}</h1>
        <h1>{{$fotografia->category->id}}</h1>
    <form id="picEdit" method="POST" action="{{url('admin/fotografias/'. $fotografia->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" id="title" required value="{{old('title',$fotografia->title ) }}"
                   class="form-control @error('title') is-invalid @enderror"

            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea rows="14" type="text"  name="description" id="description"
                      class="editor form-control @error('description') is-invalid @enderror"
                      aria-describedby="nameHelp">{{old('description',$fotografia->description) }}</textarea>
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
                            @foreach($fotografias->where('category_id',session('livCat')) as $otherPics)
                                @if($loop->index <= session('totalCat'))
                                    <option>{{$otherPics->order}}</option>
                                @endif
                                @if($loop->last && session('totalCat',-1) > 0)
                                        <option>{{$otherPics->order + 1 }}</option>
                                    @endif
                            @endforeach
                            @endif
                        @else
                            <option selected >{{$fotografia->order}}</option>
                            @foreach($fotografias->where('category_id',$fotografia->category->id) as $otherPics)
                                @if($loop->index <= $orderCount && $otherPics->order != $fotografia->order)
                                    <option>{{$otherPics->order}}</option>
                                @endif
                            @endforeach
                        @endif

                    </select>

                    @error('order')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    @enderror
                </div>
                <input type="hidden" id="lastOrder" name="lastOrder" value="{{$fotografia->order}}">
                <input type="hidden" id="pic_id" name="pic_id" value="{{$fotografia->id}}">
                <input type="hidden" id="category_change" name="category_change">
            </div>

            <div class="col 6 ">
                <div class="form-group">
                    <label for="category_id">Categorias</label>
                    <div class="input-group">
                        <select id="category_id"  name="category_id"
                                class="form-control @error('category_id')  is-invalid @enderror" >
                            @if(old('category_id') == $fotografia->category->id)

                            <option selected value="{{$fotografia->category->id}}">{{$fotografia->category->title}}</option>
                            @else
                                <option value="{{$fotografia->category->id}}">{{$fotografia->category->title}}</option>
                            @endif
                            @foreach($categorias as $categoria)

                                @if( $categoria -> title != $fotografia-> category->title)
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
                <input type="hidden" id="lastCategory" name="lastCategory" value="{{$fotografia-> category->id}}">
            </div>
        </div>

        <div class="form-group">
            <div>
                <img class="w-25 img-thumbnail" src="{{ asset('storage/' . $fotografia->image) }}" alt="image"></td>
            </div>
            <label for="image">Image</label>
            <input type="file"  name="image" id="image"
                   class="form-control @error('image') is-invalid @enderror"
                   value="{{$fotografia->image}}"  aria-describedby="nameHelp">
            @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" switch="bool" @if ($fotografia->is_active ==true) checked @endif value="{{$fotografia->is_active}}">
                <label class="custom-control-label" for="is_active">Estado Publicação</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary show_confirm_edit">Submit</button>
    </form>
</div>
