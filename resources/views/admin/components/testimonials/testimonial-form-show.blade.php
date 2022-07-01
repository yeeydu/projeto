<div class="container">
    <h2>{{$testimonial->name}}</h2>
    <a href="{{url('admin/testimonials/') }}" class="btn btn-primary">Back</a>
    <form>
        @csrf
        <div class="form-group">
            <label for="title">Name</label>
            <input type="text" name="name" id="name" autocomplete="name" class="form-control" disabled value="{{$testimonial->name}}">
        </div>
        <div class="form-group">
            <label for="summary">Description</label>
            <div class="form-control" style="background-color: #e9ecef">
                {!!$testimonial->description!!}
            </div>
        </div>

    </form>
</div>
