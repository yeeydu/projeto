
<div class="container">
    <h2>Show Fotografia</h2>
    <a href="{{ url('admin/fotografias') }}" class="btn btn-primary">Back</a>
      
        <div class="form-group">
            <label for="exampleInputPassword1">Title</label>
            <input type="text"  name="title" id="title" autocomplete="title" value="{{$fotografia->title}}"
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
            <textarea rows="14" type="text"  name="description" id="description" autocomplete="description" placeholder="description" value="{{$fotografia->description}}"
            class="form-control @error('description')
                    is-invalid
                @enderror"
            value="{{ old('description') }}" required aria-describedby="nameHelp">{{$fotografia->description}}</textarea>
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
                <option  >{{$fotografia-> category->title}}</option>
                  
                </select>
                @error('category_id')  <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            @enderror
            </div>
       </div>
            <div class="col"> 
                 <div class="form-group">
                    <label for="exampleFormControlSelect1">Position (order)</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="order" value="fotografia->order">
                        <option>{{$fotografia-> order}}</option>
                    </select>
                </div>
            </div>     
        </div>
        <label for="exampleInputPassword1">Image</label>
        <div class="w-50 "> <!----->
             @if ($fotografia->image)
                <img class="w-50 img-thumbnail" src="{{ asset('storage/' . $fotografia->image) }}" alt="image"></td>
             @else
                <p>No Image</p>  
            @endif
        </div> <!----->
        <div>
            <span class="invalid-feedback" role="alert"></span>
        </div>
    </form>
</div>



