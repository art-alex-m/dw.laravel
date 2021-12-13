<div class="d-flex flex-row justify-content-center align-items-center bg-white sm:rounded-lg mb-4">
    <p @class(['d-flex flex-column p-2 mb-0', 'bg-light' => routeIs('news')])>
        <a href="{{route('news')}}">{{__('articles.all')}}</a>
    </p>
    @foreach($categories as $item)
        <p @class(['d-flex flex-column p-2 mb-0', 'bg-light' => routeIs('news.category', $item->category)])>
            <a href="{{route('news.category', $item->category)}}">{{$item->category->title}}</a>
        </p>
    @endforeach
</div>