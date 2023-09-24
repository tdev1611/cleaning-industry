@if (isset($news))
    @foreach ($news as $item)
        <div class="box_list_news">
            <img class="lazy " style="height: 85px; width:100px" src="{{ url($item->image) }}" alt="{{ $item->title }}" />
            <h3 class="title">
                <a href="{{ route('client.news.detail', $item->slug) }}">
                    {{ $item->title }}
                </a>
            </h3>
            <ul>
                <li>
                    <span>
                        <i class="fa-solid fa-calendar-days"></i>
                        {{ date_format($item->created_at, 'Y/m/d') }}

                    </span>

                </li>
            </ul>
        </div>
    @endforeach
@endif
