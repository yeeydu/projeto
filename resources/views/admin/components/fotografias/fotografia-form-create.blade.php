
<div class="container">
    <h2>Add Fotografia</h2>
    <a href="{{ url('admin/fotografias') }}" class="btn btn-primary">Back</a>
    <form method="POST" action="{{url('admin/fotografias')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputPassword1">Title</label>
            <input type="text" name="title" id="title" autocomplete="title" placeholder="Type title" class="form-control @error('title')
                    is-invalid
                @enderror" value="{{ old('title') }}" required aria-describedby="nameHelp">
            @error('title') <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Description</label>
            <textarea rows="14" type="text"  name="description" id="description" autocomplete="description" placeholder="Type your description"
            class="editor form-control @error('address')
                    is-invalid
                @enderror"
            value="{{ old('description') }}"  aria-describedby="nameHelp">{{ old('title') }}</textarea>
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
                <select class="custom-select" id="CategoriaSelect" require name="category_id"
                class="form-control @error('category_id')
                    is-invalid
                @enderror">
                <option selected value="{{ old('category_id') }}">Choose...</option>
                    @foreach($categorias as $categoria)
                        <option  value="{{$categoria -> id}}">{{$categoria -> title}}</option>
                    @endforeach
                </select>
                @error('category_id')  <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
            @enderror
            </div>
            </div>
            <div class="col">
            <div class="form-group">
                <label for="exampleFormControlSelect1">Position (order)</label>
                    <select class="form-control" id="exampleFormControlSelect1" name="order" value="{{ old('order') }}">
                    <option selected value="{{ old('order') }}">Choose...</option>
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
