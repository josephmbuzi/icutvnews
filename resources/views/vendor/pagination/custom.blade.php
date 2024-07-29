@if ($paginator->hasPages())

        <nav>
            <ul>
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}">
                        <i class="fal fa-arrow-left"></i>
                    </a>
                </li>
                @foreach ($elements as $element)
                    @if (is_string($element))
                        <li>
                            <span class="ellipsis">{{ $element }}</span>
                        </li>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li>
                                    <span class="current">{{ $page }}</span>
                                </li>
                            @else
                                <li>
                                    <a href="{{ $url }}">{{ $page }}</a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}">
                        <i class="fal fa-arrow-right"></i>
                    </a>
                </li>
            </ul>
        </nav>

@endif
