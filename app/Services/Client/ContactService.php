<?php

namespace App\Services\Client;

use App\Models\Contact;
use Illuminate\Support\Facades\Validator;

class ContactService
{

    protected $contact;
    function __construct(Contact $contact)
    {
        $this->contact  = $contact;
    }
    function store($data)
    {
        return $this->contact->create($data);
    }

    function validateStore($data)
    {
        $validator = Validator::make(
            $data,
            [
                'name' => 'required|string|max:60',
                'phone' => 'required|numeric|digits_between:10,11',
                'address' => 'required|string',
                'note' => 'nullable|string',
                'service_id' => 'required|exists:services,id',
            ],
        );
        return $validator;
    }
}
