@if($paginator->hasPages())
    <ul class="am-pagination am-pagination-default tab-news-pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="am-disabled"><span><i class="am-icon-angle-left"></i></span></li>
        @else
            <li class="am-pagination-btn"><a class="tab-news-last-page" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="am-icon-angle-left"></i></a></li>
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
                        <li class="am-active"><a class="am-active">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li  class="am-pagination-btn"><a class="tab-news-next-page" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="am-icon-angle-right"></i></a></li>
        @else
            <li class="disabled"><span><i class="am-icon-angle-right"></i></span></li>
        @endif
    </ul>
@endif