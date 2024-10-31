<div class="blog-pagination">
    <ul class="justify-content-center">
        @if ($paginator->onFirstPage())
            <li class="disabled"><a href="#">{{__('pagination.previous')}}</a></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}">{{__('pagination.previous')}}</a></li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="disabled"><a href="#">{{ $element }}</a></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><a href="#">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}">{{__('pagination.next')}}</a></li>
        @else
            <li class="disabled"><a href="#">{{__('pagination.next')}}</a></li>
        @endif
    </ul>
</div>
