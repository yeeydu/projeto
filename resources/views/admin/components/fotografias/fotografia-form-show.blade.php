<div id="media" class="col-lg-12 col-lg-offset-2 mx-auto">
    <div class="row">
        <div class="col">
            <h2>{{$fotografia->title}}</h2>
            <a href="{{ url('admin/fotografias') }}" class="btn btn-primary">Back</a>
        </div>
    </div>

    <form>
        @csrf
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" name="title" id="title" autocomplete="title" class="form-control" disabled value="{{$fotografia->title}}">
        </div>

        <span>Descrição</span>
        <div class="show-style">
            {!!$fotografia->description!!}
        </div>

        <div class="row">
            <div class="col6">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Posição (ordem)</label>
                    <div class="form-control" style="background-color: #e9ecef;">
                        {!!$fotografia->order!!}
                    </div>
                </div>
            </div>
            <div class="col6">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Categoria</label>
                    <div class="form-control" style="background-color: #e9ecef;">
                        {!!$fotografia-> category->title!!}
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="summary">Imagem</label>
            <div class="w-50 mx-auto"> <!----->
                @if ($fotografia->image)
                    <img class="img-thumbnail" src="{{ asset('storage/' . $fotografia->image) }}" alt="image"></td>
                @else
                    <p>No Image</p>
                @endif
            </div>
        </div>

    </form>
</div>



