<div class="container">
    <h2>{{$faq->question}}</h2>
    <a href="{{url('admin/faqs/') }}" class="btn btn-primary">Back</a>
    <form>
        @csrf
        <div class="form-group">
            <label for="title">Pergunta</label>
            <input type="text" name="question" id="question" autocomplete="question" class="form-control" disabled value="{{$faq->question}}">
        </div>
        <span>Resposta</span>
        <div class="show-style">
                {!!$faq->answer!!}
        </div>

    </form>
</div>
