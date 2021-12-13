@extends('layouts.site')

@section('content')
    <x-site.article.category-menu/>

    <div class="mb-4 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg p-3">
        <div class="d-flex flex-row">
            <div class="flex-column pr-2">
                <img src="{{$item->image->path}}" width="350" alt="{{$item->title}}">
            </div>
            <div class="flex-column px-2">
                <h3>{{$item->title}}</h3>

                <div class="mb-2">
                    @foreach($item->categories as $category)
                        <a class="pr-2" href="{{route('news.category', $category)}}">{{$category->title}}</a>
                    @endforeach
                </div>

                <div class="d-flex justify-content-between mb-2 text-gray-500">
                    <span><i class="bi bi-calendar"></i>&nbsp;{{$item->created_at}}</span>
                    <span>
                        <span class="pr-1"><i class="bi bi-chat-text"></i>&nbsp;{{(int) $item->comments_count}}</span>
                        <span><i class="bi bi-eye"></i>&nbsp;{{$item->totalViews->total}}</span>
                    </span>
                </div>

                <p class="mb-0">{{$item->short}}</p>
            </div>
        </div>
        <div class="pt-3">
            {{$item->text}}
        </div>
    </div>
@endsection
