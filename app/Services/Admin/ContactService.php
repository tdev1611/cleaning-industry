<?php

namespace App\Services\Admin;

use App\Models\Contact;

class ContactService
{
    protected $Contact;
    function __construct(Contact $Contact)
    {
        $this->Contact = $Contact;
    }

    function getAll()
    {
        return $this->Contact->oldest()->with('service')->get();
    }

    // CRUD



    function find($id)
    {
        $Contact =  $this->Contact->find($id);
        if (!$Contact) {
            throw new \Exception('Not found Contact ');
        }
        return $Contact;
    }

    // update

    function update($id, $data)
    {
        $Contact = $this->find($id);
        $Contact->update([
            'status' => $data
        ]);
        return $Contact;
    }


    // deltee
    function delete($id)
    {
        $Contact = $this->find($id);
        return $Contact->delete();
    }
}
