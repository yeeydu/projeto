
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
    <h1>Utilizadores</h1>

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
                    <th class="sort" scope="col">Nome<i class="fa-solid fa-arrow-down-a-z"></i></th>
                    <th class="sort" scope="col">Email</th>
                    <th class="hide-with-media" scope="col">Telemóvel</th>
                    <th class="hide-with-media" scope="col">Morada</th>
                    <th class="sort hide-with-media" scope="col">Email cotações <i class="fa-solid fa-arrow-down-a-z"></i></th>
                    <th scope="col">Estado</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody id="listTable">
                @foreach($users as $user)
                    <tr class="text-center">
                        <td >{{$user->name}}</td>
                        <td >{{$user->email}}</td>
                        <td class="hide-with-media">{{$user->mobile_number}}</td>
                        <td class="hide-with-media">{{$user->address}}</td>
                        <td class="hide-with-media">{{$user->quote_request_email}}</td>
                        <td class="@if(auth()->user()->id == $user->id) text-success @else text-danger @endif"><i class="fa-solid fa-user"></i></td>
                        <td>
                            <div class="pr-1 d-inline-flex">
                                <a href="{{route('user.show',['user' => $user->id])}}" type="button" class="btn btn-outline-success mr-1"><i class="fa-solid fa-eye"></i></a>
                                @auth
                                    @if(auth()->user()->id == $user->id)
                                    <a href="{{route('user.edit',['user' => $user->id])}}" type="button" class="btn btn-outline-primary mr-1"><i class="fa-solid fa-pen-to-square"></i></a>
                                    @endif
                                @endauth
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>
</div>
