@foreach ($services as $service)
    <li>
        <a href="{{ route('client.services.detail', $service->slug) }}" title="{{ $service->title }}">
            {{ $service->title }}
        </a>
    </li>
@endforeach
<li>
    <a href="{{ route('client.services.index') }}" title="Tất cả dịch vụ">
        Tất cả dịch vụ
    </a>
</li>
