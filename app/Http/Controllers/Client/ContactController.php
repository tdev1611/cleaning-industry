<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Services\Client\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    protected $contactService;
    function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
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
