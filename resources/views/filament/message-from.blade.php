<div class="flex gap-4">
    @if($getRecord()->avatar === null || empty($getRecord()->avatar))
    <img class="w-9 h-9 rounded-full" src="https://ui-avatars.com/api/?name={{ urlencode($getRecord()->name)}}'&color=FFFFFF&background=111827" alt="{{ $getRecord()->email }}"/>
    @else
        <img class="w-9 h-9 rounded-full" src="{{Storage::disk()->url($getRecord()->avatar)}}" alt="{{ $getRecord()->email }}"/>
    @endif
        <p class="flex flex-col">
        <span>{{$getRecord()->name}}</span>
        <span class="text-xs">{{ $getRecord()->email }}</span>
    </p>
</div>
