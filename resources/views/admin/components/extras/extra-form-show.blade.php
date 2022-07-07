<div id="media" class="col-lg-12 col-lg-offset-2 mx-auto">
    <div class="row">
        <div class="col">
            <h2>{{$extra->name}}</h2>
            <a href="{{route('extras.index') }}" class="btn btn-primary">Voltar</a>
        </div>
    </div>

    <form>
        @csrf
        <div class="form-group">
            <label for="name">Nome do Extra</label>
            <input type="text" name="name" id="name" autocomplete="name" class="form-control" disabled value="{{$extra->name}}">
        </div>

        <span>Descrição do Extra</span>
        <div class="show-style">
            {!!$extra->description!!}
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Posição (ordem)</label>
            <div class="form-control" style="background-color: #e9ecef;">
                {!!$extra->order!!}
            </div>
        </div>

        <div class="form-group">
            <label for="price">Preço do Pack (€)</label>
            <input type="number" step="0.01" name="price" id="price" autocomplete="price" class="form-control" disabled value="{{$extra->price}}">
        </div>

        <div class="form-group">
            <label for="price_description">Descrição do extra</label>
            <input type="text" name="price_description" id="price_description" autocomplete="price_description" class="form-control" disabled value="{{$extra->price_description}}">
        </div>

        <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" disabled switch="bool" @if ($extra->is_active ==true) checked @endif value="{{$extra->is_active}}">
                <label class="custom-control-label" for="is_active">@if ($extra->is_active ==true) Item Publicado @else Item Não Publicado @endif</label>
            </div>
        </div>


    </form>
</div>
