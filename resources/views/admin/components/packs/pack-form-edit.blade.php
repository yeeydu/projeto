<div id="media" class="col-lg-12 col-lg-offset-2 mx-auto">
    @if (session('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('failed') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <h2>EDITAR - {{$pack->title}}</h2>
    <a href="{{route('packs.index') }}" class="btn btn-primary">Back</a>
    <form method="POST" action="{{route('pack.update',['pack' => $pack->id])}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Nome do Pack</label>
            <input type="text" name="title" id="title" required value="{{$pack->title}}"
                   class="form-control @error('title') is-invalid @enderror"

            @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="summary">Resumo</label>
            <textarea rows="14" type="text"  name="summary" id="summary"
                      class="editor form-control @error('summary') is-invalid @enderror"
                      aria-describedby="nameHelp">{{$pack->summary}}</textarea>
            @error('summary')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea rows="14" type="text"  name="description" id="description"
                      class="editor form-control @error('description') is-invalid @enderror"
                      aria-describedby="nameHelp">{{$pack->description}}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Posição (ordem)</label>
            <select class="form-control" id="exampleFormControlSelect1" name="order" required >
                <option selected>{{$pack->order}}</option>
                    @foreach($packs as $otherPacks)
                        @if(count($packs) > 1 && $otherPacks->order != $pack->order)
                        <option>{{$otherPacks->order}}</option>
                        @endif
                    @endforeach

            </select>
        </div>
        <input type="hidden" id="lastOrder" name="lastOrder" value="{{$pack->order}}">

        <div class="form-group">
            <label for="price">Preço</label>
            <input type="number" step="0.01" name="price" id="price" required value="{{$pack->price}}"
                   class="form-control @error('price') is-invalid @enderror">
            @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <div>
                <img class="w-25 img-thumbnail" src="{{ asset('storage/' . $pack->image) }}" alt="image"></td>
            </div>
            <label for="image">Image</label>
            <input type="file"  name="image" id="image"
                   class="form-control @error('image') is-invalid @enderror"
                   value="{{$pack->image}}"  aria-describedby="nameHelp">
            @error('image')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" switch="bool" @if ($pack->is_active ==true) checked @endif value="{{$pack->is_active}}">
                <label class="custom-control-label" for="is_active">Estado Publicação</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary show_confirm_edit">Submit</button>
    </form>
</div>
