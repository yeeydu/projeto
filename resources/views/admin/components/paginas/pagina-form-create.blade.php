
<div class="container">
    <h2>Adicionar Pagina</h2>
    <a href="{{ url('admin/paginas') }}" class="btn btn-primary">Back</a>
    <form method="POST" action="{{url('admin/paginas')}}" enctype="multipart/form-data">
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
            <label for="exampleInputPassword1">Descrição</label>

            <textarea rows="14" type="text"  name="description" id="description" autocomplete="description" placeholder="Type your description"
            class="editor form-control  @error('description')
            is-invalid
            @enderror"
            value="{{ old('description') }}" aria-describedby="nameHelp">{{ old('description') }}</textarea>

            @error('description')  <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group"> <!-----image----->
            <label for="exampleInputPassword1">Imagem</label>
            <!---- filenames[]----->
            <input type="file"  name="image" id="image"
            class="form-control @error('name')
                    is-invalid
                @enderror"
            value="{{ old('image') }}"  aria-describedby="nameHelp">
            @error('image')  <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            @enderror
        </div> <!----------->
            <div>
                <span class="invalid-feedback" role="alert"></span>
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
