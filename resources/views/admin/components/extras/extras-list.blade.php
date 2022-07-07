
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
    <h1>Extras Orçamentos</h1>
    <div class="row p-3">
        <a href="{{route('extras.create') }}" class="btn btn-primary mr-3">Adicionar Extra</a>
        <p >Adicione e altere os extras de orçamentos "titulo, preço e descrição"</p>
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
                    <th class="sort" scope="col">Extra<i class="fa-solid fa-arrow-down-a-z"></i></th>
                    <th class="hide-with-media" scope="col">Descrição</th>
                    <th class="sort hide-with-media" scope="col">Preço <i class="fa-solid fa-arrow-down-a-z"></i></th>
                    <th class="hide-with-media" scope="col">Descrição(preço)</th>
                    <th scope="col">Action</th>
                    <th class="sort" scope="col">Publicação<i class="fa-solid fa-arrow-down-a-z"></i></th>
                </tr>
                </thead>
                <tbody id="listTable">
                @foreach($extras as $extra)
                    <tr class="text-center">
                        <td class="hide-with-media" >{{$extra->order}}</td>
                        <td >{{$extra->name}}</td>
                        <td class="hide-with-media">{!!substr($extra->description,0,10).'...'!!}</td>
                        <td class="hide-with-media">{{@money($extra->price)}}</td>
                        <td class="hide-with-media">{{@priceDescription(substr($extra->price_description,0,10))}}...</td>
                        <td>
                            <div class="pr-1 d-inline-flex">
                                <a href="{{route('extra.show',['extra' => $extra->id])}}" type="button" class="btn btn-outline-success mr-1"><i class="fa-solid fa-eye"></i></a>
                                @auth
                                    <a href="{{route('extra.edit',['extra' => $extra->id])}}" type="button" class="btn btn-outline-primary mr-1"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{route('extra.destroy',['extra' => $extra->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger show_confirm"><i class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                @endauth
                            </div>
                        </td>
                        <td>
                            <form action="{{route('extra.update-state',['extra' => $extra->id])}}" method="POST" id="published_form">
                                @csrf
                                @method('PUT')
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="is_active_form{{$extra->id}}" name="is_active" switch="bool" @if ($extra->is_active ==true) checked @endif " value="{{$extra->is_active}}"  onclick="this.form.submit();">
                                    <label class="custom-control-label" for="is_active_form{{$extra->id}}">@if ($extra->is_active ==true) Ocultar @else Publicar @endif</label>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $extras->links() }}
        </div>
    </div>
</div>
