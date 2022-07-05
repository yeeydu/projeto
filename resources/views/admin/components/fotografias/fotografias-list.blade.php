
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
        <div class="col-3">
            <input class="form-control" id="myFilter" type="text" placeholder="Pesquisa"> <br>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead class="thead-dark">
                <tr class="text-center">
                    <th class="sort hide-with-media" scope="col">Ordem <i class="fa-solid fa-arrow-down-a-z"></i></th>
                    <th class="sort" scope="col">Nome<i class="fa-solid fa-arrow-down-a-z"></i></th>
                    <th class="hide-with-media" scope="col">Descrição</th>
                    <th class="sort" scope="col">Categoria<i class="fa-solid fa-arrow-down-a-z"></i></th>
                    <th class="hide-with-media" scope="col">Imagem</th>
                    <th scope="col">Action</th>
                    <th class="sort" scope="col">Publicação<i class="fa-solid fa-arrow-down-a-z"></i></th>
                </tr>
                </thead>
                <tbody id="listTable">
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
                            <div class="pr-1 d-inline-flex">
                                <a href="{{url('admin/fotografias/' . $foto->id)}}" type="button" class="btn btn-outline-success mr-1"><i class="fa-solid fa-eye"></i></a>
                                @auth
                                    <a href="{{url('admin/fotografias/' . $foto->id . '/edit')}}" type="button" class="btn btn-outline-primary mr-1"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{url('admin/fotografias/' . $foto->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger show_confirm"><i class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                @endauth
                            </div>
                        </td>
                        <td>
                            <form action="{{route('pic.update-state',['pic' => $foto->id])}}" method="POST" id="published_form">
                                @csrf
                                @method('PUT')
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="is_active_form{{$foto->id}}" name="is_active" switch="bool" @if ($foto->is_active ==true) checked @endif " value="{{$foto->is_active}}"  onclick="this.form.submit();">
                                    <label class="custom-control-label" for="is_active_form{{$foto->id}}">@if ($foto->is_active ==true) Ocultar @else Publicar @endif</label>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $fotografias->links() }}
        </div>
    </div>
</div>
