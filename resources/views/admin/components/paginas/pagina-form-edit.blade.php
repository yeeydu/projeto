
<div id="media" class="container">
    <h2>Editar - {{$pagina->page_name}}</h2>
    <a href="{{ url('admin/paginas') }}" class="btn btn-primary">Back</a>
    <form method="POST" action="{{url('admin/paginas/'. $pagina->id)}}" enctype="multipart/form-data">
         @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputPassword1">Title</label>
            <input type="text" name="title" id="title" autocomplete="title" placeholder="Type title" class="form-control @error('title')
                    is-invalid
                @enderror" value="{{ $pagina->title }}" required aria-describedby="nameHelp">
            @error('title') <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <textarea rows="14" type="text"  name="description" id="description" autocomplete="description" placeholder="Type your description"
            class="editor form-control @error('description')
                    is-invalid
                @enderror"
            value="{{ $pagina->description }}" aria-describedby="nameHelp">{!! $pagina->description !!}</textarea>
            @error('description')  <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            @enderror
        </div>

             <div class="form-group"> <!-----image----->
                <label for="exampleInputPassword1">Image</label>
                <!---- filenames[]----->
                <input type="file"  name="image" id="image"
                class="form-control @error('name')
                        is-invalid
                    @enderror"
                value="{{ $pagina->image }}"  aria-describedby="nameHelp">
                @error('image')  <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div> <!----------->
        <div class="w-50 "> <!-- show player image--->
             @if ($pagina->image)
                <img class="  img-thumbnail" src="{{ asset('storage/' . $pagina->image) }}" alt="image"></td>
             @else
                <p>No Image</p>
            @endif
        </div>
            <div>
                <span class="invalid-feedback" role="alert"></span>
            </div>
            <button type="submit" class="btn btn-primary show_confirm_edit">Update</button>
    </form>
</div>
