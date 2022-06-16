
<div class="container">
    <h2>Show Slide</h2>
    <a href="{{ url('admin/') }}" class="btn btn-primary">Back</a>
      
        <div class="form-group">
            <label for="exampleInputPassword1">Title</label>
            <input type="text"  name="title" id="title" autocomplete="title" value="{{$slider->title}}"
            class="form-control @error('title')
                    is-invalid
                @enderror"
            value="{{ old('title') }}" required aria-describedby="nameHelp">
            @error('title')  <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <textarea rows="6" type="text"  name="description" id="description" autocomplete="description" placeholder="description" value="{{$slider->description}}"
            class="form-control @error('description')
                    is-invalid
                @enderror"
            value="{{ old('description') }}" required aria-describedby="nameHelp">{{$slider->description}}</textarea>
            @error('description')  <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            @enderror
        </div>

        <label for="exampleInputPassword1">Image</label>
        <div class="w-50 "> <!----->
             @if ($slider->image)
                <img class="w-50 img-thumbnail" src="{{ asset('storage/' . $slider->image) }}" alt="image"></td>
             @else
                <p>No Image</p>  
            @endif
        </div> <!----->
        <div>
            <span class="invalid-feedback" role="alert"></span>
        </div>
    </form>
</div>



