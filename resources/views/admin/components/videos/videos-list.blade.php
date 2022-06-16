
<div class="container ">
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert"> 
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span> 
            </button>
        </div> 
        @endif
        <h1>Videos</h1>
        <div class="row m-2">
            <a href="{{ url('admin/videos/create') }}" class="btn btn-primary mr-3">Add Video</a>
            <p >Adicione e altere a lista de trabalhos de filmagem "titulo, descrição, categoria, ordem e imagem"</p>
        </div>
        
        <div class="row ">
            <div class="col-12 ">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Category</th>
                        <th scope="col">Order</th>
                        <th scope="col">Url</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($videos as $video)
                        <tr>
                            <th scope="row">{{$video->id}}</th>
                            <td class="w-25">{{$video->title}}</td>
                            <td class="">{!! Str::limit($video->description, 50) !!}</td>
                            <td class="">{{$video->category->title}}</td>
                            <td class="">{{$video->order}}</td>
                            <td class=""><x-embed url="{{ $video->url }}" /></td>
                            <!---
                            @if ($video->image)
                            <td><img class="img-thumbnail w-25" src="{{ asset('storage/' . $video->image) }}" alt="image">
                              @else
                              <p>No Image</p>  
                            @endif
                            </td> --->
                            <td class="w-25">
                                <div class="pr-1 d-lg-inline-flex ">
                                    <a href="{{url('admin/videos/' . $video->id)}}" type="button" class="btn btn-outline-success">Show</a>
                                    @auth
                                    <a href="{{url('admin/videos/' . $video->id . '/edit')}}" type="button" class="btn btn-outline-primary">Edit</a>
                                    <form action="{{url('admin/videos/' . $video->id)}}" method="POST"> 
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
            {{ $videos->links() }}
        </div>
     </div>
</div>


