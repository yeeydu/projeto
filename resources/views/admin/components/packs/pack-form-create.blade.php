<div class="container">
    <h2>Add Pack</h2>
    <a href="{{route('packs.index') }}" class="btn btn-primary">Back</a>
    <form method="POST" action="{{route('pack.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Nome do Pack</label>
            <input type="text" name="title" id="title" autocomplete="title" placeholder="Insira o nome do pack"
                   class="form-control @error('title') is-invalid @enderror"
                   required value="{{ old('title') }}">
            @error('title')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="summary">Resumo</label>
            <textarea rows="14" type="text"  name="summary" id="summary" autocomplete="summary" placeholder="Escrever o resumo do pack"
                      class="form-control @error('summary') is-invalid @enderror"
                      value="{{ old('summary') }}" aria-describedby="nameHelp">{{ old('summary') }}</textarea>
            @error('summary')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea rows="14" type="text"  name="description" id="description" autocomplete="description" placeholder="Escrever a descrição do pack"
                      class="form-control @error('description') is-invalid @enderror"
                      value="{{ old('description') }}"  aria-describedby="nameHelp">{{ old('description') }}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">Posição (ordem)</label>
            <select class="form-control" id="exampleFormControlSelect1" name="order" required value="{{ old('order') }}">
                <option selected value="{{ old('order') }}">Choose...</option>

                @if($packs->isEmpty())
                    <option>1</option>
                @else
                    @foreach($packs as $pack)
                        <option>{{$pack->order}}</option>
                        @if ($loop->last)
                            <option>{{$pack->order + 1}}</option>
                        @endif
                    @endforeach
                @endif
            </select>
        </div>

        <div class="form-group">
            <label for="price">Preço</label>
            <input type="number" step="0.01" name="price" id="price" autocomplete="price" placeholder="Insira o valor do pack"
                   class="form-control @error('price') is-invalid @enderror"
                   required value="{{ old('price') }}">
            @error('price')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group"> <!-----image----->
            <label for="image">Image</label>
            <!---- filenames[]----->
            <input type="file"  name="image" id="image"
                   class="form-control @error('image') is-invalid @enderror"
                   value="{{ old('image') }}"  aria-describedby="nameHelp">
            @error('image')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
