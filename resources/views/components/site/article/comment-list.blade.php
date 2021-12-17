@foreach($comments as $item)
    <div class="mb-4 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg p-3">
        <div class="d-flex flex-row justify-content-between">
            <span>
                <span class="text-gray-500" title="{{$item->id}}">#{{$loop->index +1}}</span>
                <b>{{$item->user->name}}</b>
            </span>
            <span class="text-gray-500"><i class="bi bi-calendar"></i>&nbsp;{{$item->created_at}}</span>
        </div>
        <p class="mb-0">{{$item->text}}</p>
    </div>
@endforeach