@extends('layouts.site')

@section('content')

    <x-site.article.category-menu/>

    @foreach($news as $item)
        <div class="mb-4 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg p-3">
            <div class="d-flex flex-row">
                <div class="flex-column pr-2">
                    <img src="{{$item->image->path}}" width="150" alt="{{$item->title}}">
                </div>
                <div class="flex-column px-2">
                    <h3>{{$item->title}}</h3>
                    <p class="mb-0">
                        {{$item->short}}
                        <a href="{{route('news.detail', $item)}}">{{__('articles.more')}}</a>
                    </p>
                </div>
            </div>
        </div>
    @endforeach
@endsection