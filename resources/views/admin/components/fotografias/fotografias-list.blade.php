
<div class="container">
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert"> 
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span> 
            </button>
        </div> 
        @endif
        <h1>Fotografias</h1>
        <div class="row m-2">
         <a href="{{ url('admin/fotografias/create') }}" class="btn btn-primary mr-3">Add Foto</a>
            <p >Adicione e altere a lista de trabalhos de fotografias "titulo, descrição, ordem e imagem"</p>
        </div>
        
        <div class="row ">
            <div class="col-12">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                     <!--<th scope="col">#</th> -->
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Category</th>
                        <th scope="col">Order</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($fotografias as $foto)
                        <tr>
                         <!--<th scope="row">{{$foto->id}}</th>-->
                            <td class="w-25">{{$foto->title}}</td>
                            <td class="w-25">{!! substr($foto->description, 0, 50) !!}</td>
                            <td class="">{{$foto->category->title}}</td>
                            <td class="">{{$foto->order}}</td>
                            
                            <td>
                            @if ($foto->image)
                                <img class="img-thumbnail" src="{{ asset('storage/' . $foto->image) }}" alt="image">
                              @else
                              <p>No Image</p>  
                              @endif
                            </td>
                            <td class="w-25">
                                <div class="pr-1 d-lg-inline-flex ">
                                    <a href="{{url('admin/fotografias/' . $foto->id)}}" type="button" class="btn btn-outline-success">Show</a>
                                    @auth
                                    <a href="{{url('admin/fotografias/' . $foto->id . '/edit')}}" type="button" class="btn btn-outline-primary">Edit</a>
                                    <form action="{{url('admin/fotografias/' . $foto->id)}}" method="POST"> 
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
            {{ $fotografias->links() }}
        </div>
     </div>
</div>


