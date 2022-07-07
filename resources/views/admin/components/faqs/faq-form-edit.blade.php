<div id="media" class="container">
    <h2>EDITAR - {{$faq->question}}</h2>
    <a href="{{url('admin/testimonials/') }}" class="btn btn-primary">Back</a>
    <form method="POST" action="{{url('admin/faqs/' .$faq->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Pergunta</label>
            <input type="text" name="question" id="question" required value="{{$faq->question}}"
                   class="form-control @error('name') is-invalid @enderror">
            @error('question')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Resposta</label>
            <textarea rows="14" type="text"  name="answer" id="answer"
                      class="editor form-control @error('description') is-invalid @enderror"
                      aria-describedby="nameHelp">{{$faq->answer}}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{$message}}</strong>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary show_confirm_edit">Submit</button>
    </form>
</div>
