
<div class="col-lg-10 col-lg-offset-2 mx-auto">
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <h1>Testimonies</h1>
    <div class="row m-2">
        <a href="{{url('testimonials.create') }}" class="btn btn-primary mr-3">Add Testimony</a>
        <p >Adicione e altere os testimonios</p>
    </div>

    <div class="row ">
        <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">Ordem</th>
                    <th scope="col">Testimonial Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($testimonials as $testimonial)
                    <tr>
                        <th scope="row">{{$testimonial->id}}</th>
                        <td class="w-25">{{$testimonial->name}}</td>
                        <td class="w-25">{!! substr($testimonial->description, 0, 50) !!}</td>
                        <td class="w-25">
                            <div class="pr-1 d-lg-inline-flex ">
                                <a href="{{url('admin/testimonials/' . $testimonial->id)}}" type="button" class="btn btn-outline-success">Show</a>
                                @auth
                                    <a href="{{url('admin/testimonials/' . $testimonial->id . '/edit')}}" type="button" class="btn btn-outline-primary">Edit</a>
                                    <form action="{{url('admin/testimonials/' . $testimonial->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger show_confirm" data-toggle="tooltip" title='Delete'>Delete</button>
                                    </form>
                                @endauth
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $testimonials->links() }}
        </div>
    </div>
</div>
