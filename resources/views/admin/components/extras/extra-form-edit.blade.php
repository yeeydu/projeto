<div id="media" class="col-lg-12 col-lg-offset-2 mx-auto">
    @if (session('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('failed') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <h2>EDITAR - {{$extra->name}}</h2>
    <a href="{{route('extras.index') }}" class="btn btn-primary">Voltar</a>
    <form method="POST" action="{{route('extra.update',['extra' => $extra->id])}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome do Extra</label>
            <input type="text" name="name" id="name" required value="{{$extra->name}}"
                   class="form-control @error('name') is-invalid @enderror"

            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Descrição do extra(p.ex: drone("Descrição do extra")</label>
            <textarea rows="14" type="text"  name="description" id="description"
                      class="editor form-control @error('description') is-invalid @enderror"
                      aria-describedby="nameHelp">{{$extra->description}}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="order">Posição (ordem)</label>
            <select class="form-control @error('order') is-invalid @enderror" id="order" name="order" required >
                <option selected>{{$extra->order}}</option>
                @foreach($extras as $otherExtras)
                    @if(count($extras) > 1 && $otherExtras->order != $extra->order)
                        <option>{{$otherExtras->order}}</option>
                    @endif
                @endforeach
            </select>
            @error('order')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            @enderror
        </div>
        <input type="hidden" id="lastOrder" name="lastOrder" value="{{$extra->order}}">

        <div class="form-group">
            <label for="price">Preço</label>
            <input type="number" step="0.01" name="price" id="price" required value="{{$extra->price}}"
                   class="form-control @error('price') is-invalid @enderror">
            @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            @enderror
        </div>


        <div class="form-group">
            <label for="price_description">Descrição deo preço (p.ex 200€(Descrição do preço))</label>
            <input type="text" name="price_description" id="price_description" required value="{{$extra->price_description}}"
                   class="form-control @error('price_description') is-invalid @enderror">

            @error('price_description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" switch="bool" @if ($extra->is_active ==true) checked @endif value="{{$extra->is_active}}">
                <label class="custom-control-label" for="is_active">Estado Publicação</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary show_confirm_edit">Submit</button>
    </form>
</div>
