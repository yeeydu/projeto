<div class="col-lg-10 col-lg-offset-2 mx-auto">
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        <h2>Slideshow</h2>
        <div class="row m-2">
            <a href="{{ url('admin/sliders/create') }}" class="btn btn-primary mr-3">Add Slide</a>
            <p >Adicione e altere a slides à homepage "titulo, descrição e imagem"</p>
        </div>

        <div class="row ">
            <div class="col-12">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>

                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sliders as $slide)
                        <tr>

                            <td class="w-25">{{$slide->title}}</td>
                            <td class="w-50">{!! Str::limit($slide->description, 15) !!}</td>
                            <td>
                            @if ($slide->image)
                                <img class="" style="width: 50px;" src="{{ asset('storage/' . $slide->image) }}" alt="image">
                              @else
                              <p>No Image</p>
                              @endif
                            </td>
                            <td class="w-25">
                                <div class="pr-1 d-lg-inline-flex ">
                                    <a href="{{url('admin/sliders/' . $slide->id)}}" type="button" class="btn btn-outline-success">Show</a>
                                    @auth
                                    <a href="{{url('admin/sliders/' . $slide->id . '/edit')}}" type="button" class="btn btn-outline-primary">Edit</a>
                                    <form action="{{url('admin/sliders/' . $slide->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                                    </form>
                                    @endauth
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $sliders->links() }}
            </div>
        </div>
</div>


