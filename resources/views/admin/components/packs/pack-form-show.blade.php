<div class="container">
    <h2>{{$pack->title}}</h2>
    <a href="{{route('packs.index') }}" class="btn btn-primary">Back</a>
    <form>
        @csrf
        <div class="form-group">
            <label for="title">Nome do Pack</label>
            <input type="text" name="title" id="title" autocomplete="title" class="form-control" disabled value="{{$pack->title}}">
        </div>

        <div class="form-group" >
            <label for="summary">Resumo</label>
            <div class="form-control" style="background-color: #e9ecef">
                {!!$pack->summary!!}
            </div>
        </div>

        <div class="form-group">
            <label for="summary">Decrição</label>
            <div class="form-control" style="background-color: #e9ecef">
                {!!$pack->description!!}
            </div>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Posição (ordem)</label>
            <div class="form-control" style="background-color: #e9ecef">
                {!!$pack->order!!}
            </div>
        </div>

        <div class="form-group">
            <label for="price">Nome do Pack</label>
            <input type="number" step="0.01" name="price" id="price" autocomplete="price" class="form-control" disabled value="{{$pack->price}}">
        </div>
        <div class="form-group">
            <label for="summary"Imagem</label>
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
