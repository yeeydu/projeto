
<div id="media" class="container media-content-true">
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
        @if (session('failed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('failed') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    <h1>Fotografias</h1>
    <div class="row p-3">
        <a href="{{ url('admin/fotografias/create') }}" class="btn btn-primary mr-3">Adicionar Foto</a>
        <p >Adicione e altere a lista de trabalhos de fotografias "titulo, descrição, ordem e imagem"</p>
    </div>

    <div class="row">
        <div class="col">
            <table class="table">
                <thead class="thead-dark">
                <tr class="text-center">
                    <th class="hide-with-media" scope="col">Ordem</th>
                    <th scope="col">Nome</th>
                    <th class="hide-with-media" scope="col">Descrição</th>
                    <th scope="col">Categoria</th>
                    <th class="hide-with-media" scope="col">Imagem</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($fotografias as $foto)
                    <tr class="text-center">
                        <td class=" hide-with-media" >{{$foto->order}}</td>
                        <td>{{$foto->title}}</td>
                        <td class="hide-with-media">{!!substr($foto->description, 0, 40)!!}...</td>
                        <td >{{$foto->category->title}}</td>
                        <td class="hide-with-media" >
                            @if ($foto->image)
                                <img class="img-fluid" src="{{ asset('storage/' . $foto->image) }}" alt="image" style="max-height: 80px">
                            @else
                                <p>No Image</p>
                            @endif
                        </td>
                        <td>
                            <div class="pr-1 d-inline-flex ">
                                <a href="{{url('admin/fotografias/' . $foto->id)}}" type="button" class="btn btn-outline-success">Mostrar</a>
                                @auth
                                    <a href="{{url('admin/fotografias/' . $foto->id . '/edit')}}" type="button" class="btn btn-outline-primary">Editar</a>
                                    <form action="{{url('admin/fotografias/' . $foto->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger show_confirm">Apagar</button>
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
