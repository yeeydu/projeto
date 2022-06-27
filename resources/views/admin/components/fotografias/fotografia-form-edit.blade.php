
<div class="container">
    <h2>Edit fotografia</h2>
    <a href="{{ url('admin/fotografias') }}" class="btn btn-primary">Back</a>
    <form method="POST" action="{{url('admin/fotografias/'. $fotografia->id)}}" enctype="multipart/form-data">
         @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputPassword1">Title</label>
            <input type="text" name="title" id="title" autocomplete="title" placeholder="Type title" class="form-control @error('title')
                    is-invalid
                @enderror" value="{{ $fotografia->title }}" required aria-describedby="nameHelp">
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
            value="{{ $fotografia->description }}"  aria-describedby="nameHelp">{{ $fotografia->description }}</textarea>
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
                <div class="input-group mb-3">
                <select class="custom-select" id="CategoriaSelect"  name="category_id"
                class="form-control @error('category_id')
                    is-invalid
                @enderror"
                value="category->title">
                <option value="{{$fotografia-> category->id}}"selected> {{$fotografia-> category->title}} </option>
                 @foreach($categorias as $categoria)
                        <option  value="{{$categoria -> id}}">{{$categoria -> title}}</option>
                    @endforeach
                </select>
                @error('category_id')  <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            @enderror
                </div>
            </div>
        </div>
            <div class="col">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Position (order)</label>
                    <select class="form-control" id="order" name="order" value="{{ old('order') }}" value="fotografia->order">
                        <option>{{$fotografia-> order}}</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                        <option>10</option>
                </select>
            </div>
        </div>
        </div>
             <div class="form-group"> <!-----image----->
                <label for="exampleInputPassword1">Image</label>
                <!---- filenames[]----->
                <input type="file"  name="image" id="image"
                class="form-control @error('name')
                        is-invalid
                    @enderror"
                value="{{ $fotografia->image }}"  aria-describedby="nameHelp">
                @error('image')  <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div> <!----------->
        <div class="w-50 "> <!-- show player image--->
             @if ($fotografia->image)
                <img class=" w-25  img-thumbnail" src="{{ asset('storage/' . $fotografia->image) }}" alt="image"></td>
             @else
                <p>No Image</p>
            @endif
        </div>
            <div>
                <span class="invalid-feedback" role="alert"></span>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
