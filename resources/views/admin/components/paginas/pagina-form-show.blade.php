
<div class="container">
    <h2>Show Page</h2>
    <a href="{{ url('admin/paginas') }}" class="btn btn-primary">Back</a>
      
        <div class="form-group">
            <label for="exampleInputPassword1">Title</label>
            <input type="text"  name="title" id="title" autocomplete="title" value="{{$paginas->title}}"
            class="form-control @error('title')
                    is-invalid
                @enderror"
            value="{{ old('title') }}" required aria-describedby="nameHelp">
            @error('title')  <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            @enderror
        </div>
        <span>Description</span>
        <div class="show-style">
                {!!$paginas->description!!}
        </div>

        <label for="exampleInputPassword1">Image</label>
        <div class="w-50 "> <!----->
             @if ($paginas->image)
                <img class="w-50 img-thumbnail" src="{{ asset('storage/' . $paginas->image) }}" alt="image"></td>
             @else
                <p>No Image</p>  
            @endif
        </div> <!----->
        <div>
            <span class="invalid-feedback" role="alert"></span>
        </div>
    </form>
</div>



