
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
    <h1>Packs Orçamentos</h1>
    <div class="row p-3">
        <a href="{{route('packs.create') }}" class="btn btn-primary mr-3">Adicionar Pack</a>
        <p >Adicione e altere os packs de orçamentos "titulo, resumo, descrição, imagem e preço"</p>
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
                    <th class="sort" scope="col">Nome do Pack <i class="fa-solid fa-arrow-down-a-z"></i></th>
                    <th class="hide-with-media" scope="col">Resumo</th>
                    <th class="hide-with-media" scope="col">Descrição</th>
                    <th class="hide-with-media" scope="col">Imagem</th>
                    <th class="sort hide-with-media" scope="col">Preço <i class="fa-solid fa-arrow-down-a-z"></i></th>
                    <th scope="col">Action</th>
                    <th class="sort" scope="col">Publicação<i class="fa-solid fa-arrow-down-a-z"></i></th>
                </tr>
                </thead>
                <tbody id="listTable">
                @foreach($packs as $pack)
                    <tr class="text-center">
                        <td class="hide-with-media" >{{$pack->order}}</td>
                        <td >{{$pack->title}}</td>
                        <td class="hide-with-media">{{strip_tags(substr($pack->summary,0,40)).'...'}}</td>
                        <td class="hide-with-media">{{strip_tags(substr($pack->description,0,40)).'...'}}</td>
                        <td class="hide-with-media" >
                            @if ($pack->image)
                                <img class="img-fluid" src="{{ asset('storage/' . $pack->image) }}" alt="image" style="max-height: 80px">
                            @else
                                <p>No Image</p>
                            @endif
                        </td>
                        <td class="hide-with-media">{{@money($pack->price)}}</td>
                        <td>
                            <div class="pr-1 d-inline-flex">
                                <a href="{{route('pack.show',['pack' => $pack->id])}}" type="button" class="btn btn-outline-success mr-1"><i class="fa-solid fa-eye"></i></a>
                                @auth
                                    <a href="{{route('pack.edit',['pack' => $pack->id])}}" type="button" class="btn btn-outline-primary mr-1"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{route('pack.destroy',['pack' => $pack->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger show_confirm"><i class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                @endauth
                            </div>
                        </td>
                        <td>
                            <form action="{{route('pack.update-state',['pack' => $pack->id])}}" method="POST" id="published_form">
                                @csrf
                                @method('PUT')
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="is_active_form{{$pack->id}}" name="is_active" switch="bool" @if ($pack->is_active ==true) checked @endif " value="{{$pack->is_active}}"  onclick="this.form.submit();">
                                    <label class="custom-control-label" for="is_active_form{{$pack->id}}">@if ($pack->is_active ==true) Ocultar @else Publicar @endif</label>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $packs->links() }}
        </div>
    </div>
</div>
