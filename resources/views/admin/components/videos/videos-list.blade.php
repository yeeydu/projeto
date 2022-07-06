
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

        <h1>Videos</h1>
        <div class="row p-3">
            <a href="{{ url('admin/videos/create') }}" class="btn btn-primary mr-3">Add Video</a>
            <p >Adicione e altere a lista de trabalhos de filmagem Particular e Corporate "titulo, descrição, categoria, ordem e link"</p>
        </div>

        <div class="row">
        <div class="col-3">
            <input class="form-control" id="myFilter" type="text" placeholder="Pesquisa"> <br>
        </div>
    </div>
        
        <div class="row ">
            <div class="col-ms-12 ">
                <table class="table">
                    <thead class="thead-dark">
                    <tr class="text-center">
                    <th class="sort hide-with-media" scope="col">Ordem <i class="fa-solid fa-arrow-down-a-z"></i></th>
                    <th class="sort" scope="col">Titulo<i class="fa-solid fa-arrow-down-a-z"></i></th>
                    <th class="hide-with-media" scope="col">Descrição</th>
                    <th class="sort" scope="col">Categoria<i class="fa-solid fa-arrow-down-a-z"></i></th>
                    <th class="hide-with-media" scope="col">Video</th>
                    <th scope="col">Ação</th>
                    <th class="sort" scope="col">Publicação<i class="fa-solid fa-arrow-down-a-z"></i></th>
                </tr>
                    </thead>
                    <tbody id="listTable">
                    @foreach($videos as $video)
                    <tr class="text-center">
                            <td class=" hide-with-media" >{{$video->order}}</td>
                            <td class="">{{$video->title}}</td>
                            <td class="hide-with-media">{!! substr($video->description, 0, 50) !!}</td>
                            <td class="">{{$video->category->title}}</td>
                            <td class="hide-with-media embed"><x-embed url="{{ $video->url }}" /></td>
                            <!---
                            @if ($video->image)
                            <td><img class="img-thumbnail w-25" src="{{ asset('storage/' . $video->image) }}" alt="image">
                              @else
                              <p>No Image</p>  
                            @endif
                            </td> --->
                            <td >
                                <div class="pr-1 d-inline-flex">
                                    <a href="{{url('admin/videos/' . $video->id)}}" type="button" class="btn btn-outline-success mr-1"><i class="fa-solid fa-eye"></i></a>
                                    @auth
                                    <a href="{{url('admin/videos/' . $video->id . '/edit')}}" type="button" class="btn btn-outline-primary mr-1"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{url('admin/videos/' . $video->id)}}" method="POST"> 
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger show_confirm"><i class="fa-solid fa-trash-can"></i></button> 
                                    </form>
                                    @endauth
                                </div>
                            </td>
                            <td>
                            <form action="{{route('video.update-state',['video' => $video->id])}}" method="POST" id="published_form">
                                @csrf
                                @method('PUT')
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="is_active_form{{$video->id}}" name="is_active" switch="bool" @if ($video->is_active ==true) checked @endif " value="{{$video->is_active}}"  onclick="this.form.submit();">
                                    <label class="custom-control-label" for="is_active_form{{$video->id}}">@if ($video->is_active ==true) Ocultar @else Publicar @endif</label>
                                </div>
                            </form>
                        </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            {{ $videos->links() }}
        </div>
     </div>
</div>


