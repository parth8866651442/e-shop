@if ($paginator->hasPages())

<div class="shop-pagination">
    <ul>
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
        <li class="disabled"><a><i class="sp-arrow-bold-left"></i></a></li>
        @else
        <li><a href="{{ $paginator->previousPageUrl() }}"><i class="sp-arrow-bold-left"></i></a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
            <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                    <li class="active"><a>{{ $page }}</a></li>
                    @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}"><i class="sp-arrow-bold-right"></i></a></li>
        @else
            <li class="disabled"><a><i class="sp-arrow-bold-right"></i></a></li>
        @endif
    </ul>
</div>
@endif