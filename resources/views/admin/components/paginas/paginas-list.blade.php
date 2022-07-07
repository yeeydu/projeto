
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
        <h1>Paginas Principais</h1>
        <div class="row m-2">
            <!-----  Desativar criar pagina  ----
            <a href="{{ url('admin/paginas/create') }}" class="btn btn-primary mr-4">Adicionar Página</a> 
            -----    ----->
            <p >Altere o conteudo de cada página como "titulo, descrição e imagem principal"</p>
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
                    <tr>
                      <!-- <th scope="col">#</th>-->
                      <th class="sort" scope="col">Nome Pagina <i class="fa-solid fa-arrow-down-a-z"></i></th>  
                        <th class="sort" scope="col">Titulo <i class="fa-solid fa-arrow-down-a-z"></i></th>  
                        <th class="hide-with-media" scope="col">Descrição</th>
                        <th class="hide-with-media" scope="col">Imagem</th>
                        <th scope="col">Action</th>
                        <th class="sort" scope="col">Publicação<i class="fa-solid fa-arrow-down-a-z"></i></th>
                    </tr>
                    </thead>
                    <tbody id="listTable">
                    @foreach($paginas as $pagina)
                        <tr>
                          <!--<th scope="row">{{$pagina->id}}</th>-->
                          <td class="">{{$pagina->page_name}}</td>
                            <td class="">{{$pagina->title}}</td> 
                            <td class="hide-with-media">{!! strip_tags(substr($pagina->description,0, 40)) !!}</td>                            
                            <td class="hide-with-media">
                            @if ($pagina->image)
                              <img class="img-fluid" src="{{ asset('storage/' . $pagina->image) }}"alt="image" style="max-height: 80px">
                              @else
                              <p>No Image</p>  
                            @endif
                            </td>
                            <td class="">
                                 <div class="pr-1 d-inline-flex">
                                    <a href="{{url('admin/paginas/' . $pagina->id)}}" type="button" class="btn btn-outline-success"><i class="fa-solid fa-eye"></i></a>
                                    @auth
                                    <a href="{{url('admin/paginas/' . $pagina->id . '/edit')}}" type="button" class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                     <!-----  Desativar Eliminar pagina  ----
                                    <form action="{{url('admin/paginas/' . $pagina->id)}}" method="POST"> 
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger show_confirm"><i class="fa-solid fa-trash-can"></i></button> 
                                    </form>
                                    ----   ---->
                                    @endauth
                                </div>
                            </td>
                            <td>
                            <form action="{{route('paginas.update-state',['pagina' => $pagina->id])}}" method="POST" id="published_form">
                                @csrf
                                @method('PUT')
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="is_active_form{{$pagina->id}}" name="is_active" switch="bool" @if ($pagina->is_active ==true) checked @endif " value="{{$pagina->is_active}}"  onclick="this.form.submit();">
                                    <label class="custom-control-label" for="is_active_form{{$pagina->id}}">@if ($pagina->is_active ==true) Ocultar @else Publicar @endif</label>
                                </div>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            {{ $paginas->links() }}
        </div>
     </div>
</div>


