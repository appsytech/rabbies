@if ($paginator->hasPages())
<div class="page-nav-wrap text-center" aria-label="{{ __('Pagination Navigation') }}">
    <ul>
        @if ($paginator->onFirstPage())
        <li><a class="page-numbers disabled" href="#"><i class="fa-solid fa-arrow-left"></i></a></li>
        @else
        <li><a class="page-numbers style-2" href="{{ $paginator->previousPageUrl() }}"><i class="fa-solid fa-arrow-left"></i></a></li>
        @endif

        @foreach ($elements as $element)
        @if (is_string($element))
        <span aria-disabled="true">
            <li><a class="page-numbers " href="#">{{ $element }}</a></li>
        </span>
        @endif

        @if (is_array($element))
        @foreach ($element as $page => $url)
        <li><a class="page-numbers {{ $paginator->currentPage() == $page ? 'current' : '' }}" href="{{ $url }}">{{ $page }}</a></li>
        @endforeach
        @endif
        @endforeach

        @if ($paginator->hasMorePages())
        <li><a class="page-numbers style-2" href="{{ $paginator->nextPageUrl() }}"><i class="fa-solid fa-arrow-right"></i></a></li>

        @else
        <li><a class="page-numbers style-2" href="#"><i class="fa-solid fa-arrow-right"></i></a></li>
        @endif
    </ul>
</div>
@endif