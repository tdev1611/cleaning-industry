<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\Client\ContactService;
use Illuminate\Http\Request;

use App\Models\Contact_Info;

class ContactController extends Controller
{

    protected $contactService, $contact_Info;
    function __construct(ContactService $contactService, Contact_Info $contact_Info)
    {
        $this->contactService = $contactService;
        $this->contact_Info = $contact_Info;
    }


    function index()
    {
        $contact =  $this->contact_Info->where('status', 1)->first();
        return view('client.contact.index', compact('contact'));
    }


    function contact_post(Request $request)
    {
        try {
            $data = $request->all();
            $validator = $this->contactService->validateStore($data);
            if ($validator->fails()) {
                throw new \Exception($validator->errors()->first());
            }

            $this->contactService->store($data);
            return response()->json([
                'status' => 'success',
                'message' => 'Gửi liên hệ thành công',
            ], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }
}
