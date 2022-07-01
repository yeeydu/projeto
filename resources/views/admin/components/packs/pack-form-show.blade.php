<div id="media" class="col-lg-12 col-lg-offset-2 mx-auto">
    <div class="row">
        <div class="col">
            <h2>{{$pack->title}}</h2>
            <a href="{{route('packs.index') }}" class="btn btn-primary">Voltar</a>
        </div>
    </div>

    <form>
        @csrf
        <div class="form-group">
            <label for="title">Nome do Pack</label>
            <input type="text" name="title" id="title" autocomplete="title" class="form-control" disabled value="{{$pack->title}}">
        </div>

        <span>Resumo</span>
        <div class="show-style">
            {!!$pack->summary!!}
        </div>

        <span>Descrição</span>
        <div class="show-style">
                {!!$pack->description!!}
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Posição (ordem)</label>
            <div class="form-control" style="background-color: #e9ecef;">
                {!!$pack->order!!}
            </div>
        </div>

        <div class="form-group">
            <label for="price">Preço do Pack</label>
            <input type="number" step="0.01" name="price" id="price" autocomplete="price" class="form-control" disabled value="{{$pack->price}}">
        </div>
        <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" disabled switch="bool" @if ($pack->is_active ==true) checked @endif value="{{$pack->is_active}}">
                <label class="custom-control-label" for="is_active">@if ($pack->is_active ==true) Item Publicado @else Item Não Publicado @endif</label>
            </div>
        </div>
        <div class="form-group">
            <label for="summary">Imagem</label>
            <div class="w-50 mx-auto"> <!----->
                @if ($pack->image)
                    <img class="img-thumbnail" src="{{ asset('storage/' . $pack->image) }}" alt="image"></td>
                @else
                    <p>No Image</p>
                @endif
            </div>
        </div>

    </form>
</div>
