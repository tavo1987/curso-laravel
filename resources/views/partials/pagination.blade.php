@if ($paginator->hasPages())
    <ul class="list-reset flex mt-4" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="block py-1 no-underline px-4 bg-indigo text-white rounded mx-1" aria-hidden="true">&lsaquo;</span>
            </li>
        @else
            <li>
                <a class="block py-1 no-underline px-4 bg-indigo text-white rounded mx-1" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="block py-1 no-underline px-4 bg-blue text-white rounded mx-1" aria-current="page"><span>{{ $page }}</span></li>
                    @else
                        <li><a class="block py-1 no-underline px-4 bg-indigo text-white rounded mx-1" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a class="block py-1 no-underline px-4 bg-indigo text-white rounded mx-1" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>
        @else
            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="block py-1 no-underline px-4 bg-indigo text-white rounded mx-1" aria-hidden="true">&rsaquo;</span>
            </li>
        @endif
    </ul>
@endif
