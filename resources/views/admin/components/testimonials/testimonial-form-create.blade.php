<div class="container">
    <h2>Add Pack</h2>
    <a href="{{url('admin/testimonials') }}" class="btn btn-primary">Back</a>
    <form method="POST" action="{{url('admin/testimonials')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Name</label>
            <input type="text" name="name" id="name" autocomplete="name" placeholder="Insert name"
                   class="form-control @error('name') is-invalid @enderror"
                   required value="{{ old('name') }}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea rows="14" type="text"  name="description" id="description" autocomplete="description" placeholder="Description"
                      class="editor form-control @error('description') is-invalid @enderror"
                      value="{{ old('description') }}"  aria-describedby="nameHelp">{{ old('description') }}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
