@if ($paginator->hasPages())
    <ul class="unstyled inbox-pagination">
        {{-- Previous Page Link --}}
        <li><span>{{$paginator->firstItem()}} - {{$paginator->lastItem()}} of {{$paginator->total()}}</span></li>
        @if ($paginator->onFirstPage())
        <li>
            <a class="pl-15 pr-15"><i class="fa fa-angle-left  pagination-left"></i></a>
        </li>
        @else
        <li>
            <a class="pl-15 pr-15" href="{{ $paginator->previousPageUrl() }}"><i class="fa fa-angle-left  pagination-left"></i></a>
        </li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
        <li>
            <a href="{{ $paginator->nextPageUrl() }}"><i class="fa fa-angle-right pagination-right"></i></a>
        </li>
        @else
            <li>
            <a><i class="fa fa-angle-right pagination-right"></i></a>
        </li>
        @endif
    </ul>
@endif