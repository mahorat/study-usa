@if ($paginator->hasPages())
{{-- Previous Page Link --}}
<p class="navbar-text"><span class="text-semibold">{{$paginator->firstItem()}}-{{$paginator->lastItem()}}</span> of <span class="text-semibold">{{$paginator->total()}}</span></p>

<div class="btn-group navbar-left navbar-btn">
    @if ($paginator->onFirstPage())
    <button type="button" class="btn btn-default btn-icon disabled"><i class="icon-arrow-left12"></i></a></button>
    @else
    <button type="button" class="btn btn-default btn-icon disabled"><a href="{{ $paginator->previousPageUrl() }}"><i class="icon-arrow-left12"></i></a></button>
    @endif

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <button type="button" class="btn btn-default btn-icon"><a href="{{ $paginator->nextPageUrl() }}"><i class="icon-arrow-right13"></i></a></button>
    @else
    <button type="button" class="btn btn-default btn-icon"><i class="icon-arrow-right13"></i></button>
    @endif
</div>
@endif