<div class="container">
    <h2>EDIT - {{$testimonial->name}}</h2>
    <a href="{{url('admin/testimonials/') }}" class="btn btn-primary">Back</a>
    <form method="POST" action="{{url('admin/testimonials/' .$testimonial->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Name</label>
            <input type="text" name="name" id="name" required value="{{$testimonial->name}}"
                   class="form-control @error('name') is-invalid @enderror">
            @error('name')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea rows="14" type="text"  name="description" id="description"
                      class="editor form-control @error('description') is-invalid @enderror"
                      aria-describedby="nameHelp">{{$testimonial->description}}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
