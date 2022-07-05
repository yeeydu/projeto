<div class="container">
    <h2>{{$testimonial->name}}</h2>
    <a href="{{url('admin/testimonials/') }}" class="btn btn-primary">Back</a>
    <form>
        @csrf
        <div class="form-group">
            <label for="title">Nome</label>
            <input type="text" name="name" id="name" autocomplete="name" class="form-control" disabled value="{{$testimonial->name}}">
        </div>
        <span>Description</span>
        <div class="show-style">
                {!!$testimonial->description!!}
        </div>

    </form>
</div>
