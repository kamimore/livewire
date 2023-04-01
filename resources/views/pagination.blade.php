@if ($paginator->hasPages())
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="page-item">
                    <span class="page-link text-dark bg-light">
                        Prev
                    </span>
                </li>
            @else
                <li class="page-item" wire:click="previousPage">
                    <span class="page-link text-dark">
                        Prev
                    </span>
                </li>
            @endif

            {{-- "Three Dots" Separator --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item" wire:click="gotoPage({{ $page }})">
                                <span class="page-link text-dark bg-info text-white">
                                    {{ $page }}
                                </span>
                            </li>
                        @else
                            <li class="page-item" wire:click="gotoPage({{ $page }})">
                                <span class="page-link text-dark">
                                    {{ $page }}
                                </span>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach


            @if ($paginator->hasMorePages())
                <li class="page-item" wire:click="nextPage">
                    <span class="page-link text-dark">
                        Next
                    </span>
                </li>
            @else
                <li class="page-itemt">
                    <span class="page-link text-dark bg-light">
                        Next
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
