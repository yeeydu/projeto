
<div class="container">
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert"> 
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span> 
            </button>
        </div> 
        @endif
        <h1>Main Frontend Content</h1>
        <div class="row m-2">
            <!-----  Desativar criar pagina  ----->
            <a href="{{ url('admin/paginas/create') }}" class="btn btn-primary mr-4">Add Page</a> 
            <!-----    ----->
            <p >Altere o conteudo de cada página como "titulo, descrição e imagem principal"</p>
        </div>
        <div class="row ">
            <div class="col-12 ">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                      <!-- <th scope="col">#</th>-->
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($paginas as $pagina)
                        <tr>
                          <!--<th scope="row">{{$pagina->id}}</th>-->
                            <td class="w-25">{{$pagina->title}}</td>
                            <td class="w-25">{!! substr($pagina->description,0, 50) !!}</td>                            
                            <td>
                            @if ($pagina->image)
                              <img class="img-thumbnail w-25" src="{{ asset('storage/' . $pagina->image) }}" alt="image">
                              @else
                              <p>No Image</p>  
                            @endif
                            </td>
                            <td class="w-25">
                                <div class="pr-1 d-lg-inline-flex ">
                                    <a href="{{url('admin/paginas/' . $pagina->id)}}" type="button" class="btn btn-outline-success">Show</a>
                                    @auth
                                    <a href="{{url('admin/paginas/' . $pagina->id . '/edit')}}" type="button" class="btn btn-outline-primary">Edit</a>
                                    <!-----    ----->
                                    <form action="{{url('admin/paginas/' . $pagina->id)}}" method="POST"> 
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger">Delete</button> 
                                    </form>
                                    <!----   ---->
                                    @endauth
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            {{ $paginas->links() }}
        </div>
     </div>
</div>


