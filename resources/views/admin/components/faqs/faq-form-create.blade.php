<div class="container">
    <h2>Adicionar FAQ</h2>
    <a href="{{url('admin/faqs') }}" class="btn btn-primary">Back</a>
    <form method="POST" action="{{url('admin/faqs')}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Pergunta</label>
            <input type="text" name="question" id="question" autocomplete="question" placeholder="Inserir pergunta"
                   class="form-control @error('question') is-invalid @enderror"
                   required value="{{ old('question') }}">
            @error('question')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Resposta</label>
            <textarea rows="14" type="text"  name="answer" id="answer" autocomplete="answer" placeholder="Resposta"
                      class="editor form-control @error('description') is-invalid @enderror"
                      value="{{ old('description') }}"  aria-describedby="nameHelp">{{ old('answer') }}</textarea>
            @error('answer')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            @enderror
        </div>
        <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" switch="bool">
            <label class="custom-control-label" for="is_active">Publicar</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
