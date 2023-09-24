<ul class="links categorys_links">
    @if (isset($categories))
        @foreach ($categories as $category)
            <li class="d-flex justify-content-between">
                <a href="{{ route('client.news.index', $category->slug) }}">
                    {{ $category->title }}
                </a>
                <a href="{{ route('client.news.index', $category->slug) }}"><i class="fa-solid fa-arrow-right"></i>
                </a>
            </li>
        @endforeach
    @endif

</ul>
