<div id="media" class="col-lg-12 col-lg-offset-2 mx-auto">
    <div class="row">
        <div class="col">
            <h2>{{$video->title}}</h2>
            <a href="{{ url('admin/videos') }}" class="btn btn-primary">Voltar</a>
        </div>
    </div>

    <form>
        @csrf
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" id="title" autocomplete="title" class="form-control" disabled value="{{$video->title}}">
        </div>

        <span>Descrição</span>
        <div class="show-style">
            {!!$video->description!!}
        </div>

        <div class="row mt-3 mb-3">
            <div class="col 6 ">
                <span>Posição (ordem)</span>
                <div class="show-style">
                    {!!$video->order!!}
                </div>
            </div>
            <div class="col 6 ">
                <span>Categoria</span>
                <div class="show-style">
                    {!!$video-> category->title!!}
                </div>

            </div>
        </div>

        <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" disabled switch="bool" @if ($video->is_active ==true) checked @endif value="{{$video->is_active}}">
                <label class="custom-control-label" for="is_active">@if ($video->is_active ==true) Item Publicado @else Item Não Publicado @endif</label>
            </div>
        </div>

        <div class="pb-3 w-50">
            <x-embed url="{{ $video->url }}" />
        </div>

    </form>
</div>