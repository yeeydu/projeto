
<div class="container">
    @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('status') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <h1>Packs Orçamentos</h1>
    <div class="row m-2">
        <a href="{{route('packs.create') }}" class="btn btn-primary mr-3">Adicionar Pack</a>
        <p >Adicione e altere os packs de orçamentos "titulo, resumo, descrição, imagem e preço"</p>
    </div>

    <div class="row ">
        <div class="col-12">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome do Pack</th>
                    <th scope="col">Resumo</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($packs as $pack)
                    <tr>
                        <th scope="row">{{$pack->id}}</th>
                        <td class="w-25">{{$pack->title}}</td>
                        <td class="w-25">{!! Str::limit($pack->summary, 50) !!}</td>
                        <td class="w-25">{!! Str::limit($pack->descriprion, 50) !!}</td>
                        <td>
                            @if ($pack->image)
                                <img class="img-thumbnail" src="{{ asset('storage/' . $pack->image) }}" alt="image">
                            @else
                                <p>No Image</p>
                            @endif
                        </td>
                        <td class="w-25">{{$pack->price}}</td>
                        <td class="w-25">
                            <div class="pr-1 d-lg-inline-flex ">
                                <a href="{{route('pack.show',['pack' => $pack->id])}}" type="button" class="btn btn-outline-success">Show</a>
                                @auth
                                    <a href="{{url('admin/fotografias/' . $pack->id . '/edit')}}" type="button" class="btn btn-outline-primary">Edit</a>
                                    <form action="{{url('admin/fotografias/' . $pack->id)}}" method="POST">
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
            {{ $packs->links() }}
        </div>
    </div>
</div>
