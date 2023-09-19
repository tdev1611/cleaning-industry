<ul>
    <li>
       <h4> {{ $introduce->title }}</h4>
    </li>
    <li> <i class="fa-solid fa-phone fa-shake mt-1 mr-2"></i>
        {{ $contact ? $contact->phone : null }}
    </li>
    <li>
        <i class="fa-solid fa-location-dot mt-1 mr-2"></i>
        {{ $contact ? $contact->address : null }}
    </li>

    <li>
        <i class="fa-regular fa-envelope mt-1 mr-2"></i>
        {{ $contact ? $contact->email : null }}
    </li>
    <li>
        <a target="_blank" href="{{ $contact ? $contact->link : null }}">
            <i class="fa-solid fa-globe mt-1 mr-2"></i>
            {{ $contact ? $contact->link : null }}
        </a>
    </li>
</ul>
