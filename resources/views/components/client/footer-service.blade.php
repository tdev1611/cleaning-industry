@foreach ($services as $service)
    <li>
        <a href="{{ route('client.services.detail', $service->slug) }}" title="{{ $service->title }}">
            {{ $service->title }}
        </a>
    </li>
@endforeach
