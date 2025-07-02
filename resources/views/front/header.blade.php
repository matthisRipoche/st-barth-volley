
<!-- Header menu -->
<header class="front-header">
    <div class="wrapper">
        <a href="{{ route('front.home') }}">ST Barth</a>

        @if($headerMenu)
            <nav>
                <ul>
                    @foreach($headerMenu?->items->sortBy('order') as $item)
                        <li class="nav-item">
                            <a href="{{ $item->page ? route('front.page', $item->page) : url($item->url) }}" class="nav-link">
                                {{ $item->label }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </nav>
        @endif
    </div>
</header>