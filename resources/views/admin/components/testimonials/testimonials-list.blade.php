
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
    <h1>Testemunhos</h1>
    <div class="row p-3">
        <a href="{{url('admin/testimonials/create') }}" class="btn btn-primary mr-3">Adicionar Testemunho</a>
        <p >Adicione e altere os testemunhos</p>
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
                    <th class="sort hide-with-media" scope="col">Ordem <i class="fa-solid fa-arrow-down-a-z"></i></th>
                    <th class="sort" scope="col">Nome Testemunho<i class="fa-solid fa-arrow-down-a-z"></i></th>
                    <th class="hide-with-media" scope="col">Descrição</th>    
                    <th scope="col">Ação</th>
                    <th scope="col">Publicação</th>
                </tr>
                </thead>
                <tbody id="listTable">
                @foreach($testimonials as $testimonial)
                    <tr>
                        <th class="hide-with-media" >{{$testimonial->id}}</th>
                        <td class=" ">{{$testimonial->name}}</td>
                        <td class="hide-with-media" >{!! substr($testimonial->description, 0, 40) !!}</td>
                        <td>
                            <div class="pr-1 d-lg-inline-flex ">
                                <a href="{{url('admin/testimonials/' . $testimonial->id)}}" type="button" class="btn btn-outline-success"><i class="fa-solid fa-eye"></i></a>
                                @auth
                                    <a href="{{url('admin/testimonials/' . $testimonial->id . '/edit')}}" type="button" class="btn btn-outline-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form action="{{url('admin/testimonials/' . $testimonial->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger show_confirm" data-toggle="tooltip" title='Delete'><i class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                @endauth
                            </div>
                        </td>
                        <td>
                            <form action="{{route('testimonials.update-state',['testimonial' => $testimonial->id])}}" method="POST" id="published_form">
                                @csrf
                                @method('PUT')
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="is_active_form{{$testimonial->id}}" name="is_active" switch="bool" @if ($testimonial->is_active == true) checked @endif "value="{{$testimonial->is_active}}"  onclick="this.form.submit();">
                                    <label class="custom-control-label" for="is_active_form{{$testimonial->id}}">@if ($testimonial->is_active == true) Ocultar @else Publicar @endif</label>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $testimonials->links() }}
        </div>
    </div>
</div>
