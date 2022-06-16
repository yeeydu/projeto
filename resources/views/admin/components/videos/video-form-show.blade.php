
<div class="container">
    <h2>Show Video</h2>
    <a href="{{ url('admin/videos') }}" class="btn btn-primary">Back</a>
      
        <div class="form-group">
            <label for="exampleInputPassword1">Title</label>
            <input type="text"  name="title" id="title" autocomplete="title" value="{{$video->title}}"
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
            <textarea rows="14" type="text"  name="description" id="description" autocomplete="description" placeholder="description" value="{{$video->description}}"
            class="form-control @error('description')
                    is-invalid
                @enderror"
            value="{{ old('description') }}" required aria-describedby="nameHelp">{{$video->description}}</textarea>
            @error('description')  <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="row"> 
        <div class="col"> 
            <div class="form-group">
                <div class="input-group-prepend">
                    <label  for="PlayerSelect">Category</label>
                </div>
                <select  id="CategoriaSelect" name="category_id"
                class="form-control @error('category_id')
                    is-invalid
                @enderror" 
                value="category->title">
                <option  >{{$video-> category->title}}</option>
                  
                </select>
                @error('category_id')  <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            @enderror
            </div>
       </div>
            <div class="col"> 
                 <div class="form-group">
                    <label for="exampleFormControlSelect1">Position (order)</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="order" value="video->order">
                        <option>{{$video-> order}}</option>
                    </select>
                </div>
            </div>     
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Link</label>
            <input type="text" name="url" id="url" autocomplete="url" placeholder="Type url" class="form-control @error('url')
                    is-invalid
                @enderror" value=" {{ $video->url }}" required aria-describedby="nameHelp">
            @error('url') <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div>
        <div class="pb-3">
            <x-embed url="{{ $video->url }}" />
        </div>
        <!---
        <label for="exampleInputPassword1">Image</label>
        <div class="w-50 "> -----
             @if ($video->image)
                <img class="w-50 img-thumbnail" src="{{ asset('storage/' . $video->image) }}" alt="image"></td>
             @else
                <p>No Image</p>  
            @endif
        </div> ----->
        <div>
            <span class="invalid-feedback" role="alert"></span>
        </div>
    </form>
</div>



