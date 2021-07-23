<div class="pagination" style="margin-top: 18px">
    @if ($paginator->hasPages())
    <ul>

        @if ($paginator->onFirstPage())
        <li class="disabled"><a>&lt;</a></li>
        @else
        <li><a  href="{{ $paginator->previousPageUrl() }}">&lt;</a></li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
            <li><a class="disabled">{{ $element }}</a></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active my-active"><a>{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
        <li ><a href="{{ $paginator->nextPageUrl() }}">&gt;</a></li>
        @else
        <li class="disabled"><a >&gt;</a></li>
        @endif
    </ul>
    @endif
</div>