<div {{$attributes}} class="comment-form">
    @if(\Illuminate\Support\Facades\Session::get('comment-created'))
        <div class="alert alert-success" role="alert">
            Комментарий успешно добавлен
        </div>
    @endif
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            {!! implode('', $errors->all('<div>:message</div>')) !!}
        </div>
    @endif
    <form action="{{$saveUrl}}" method="post">
        @csrf
        <div class="d-flex form-group justify-content-end">
            <textarea name="comment[text]"
                      rows="3"
                      class="form-control"
                      required
                      placeholder="{{__('articles.comment-text')}}"></textarea>

            <button type="submit"
                    class="btn btn-outline-success ml-1"
                    title="{{__('articles.save')}}"><i class="bi bi-caret-right-fill"></i></button>
        </div>
    </form>
</div>