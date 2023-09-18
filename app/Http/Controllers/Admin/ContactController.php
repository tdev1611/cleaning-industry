<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\ContactService;

class ContactController extends Controller
{
    //
    protected $contactService;
    function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }


    function index()
    {
        $contacts = $this->contactService->getAll();
        return view('admin.contacts.index', compact('contacts'));
    }


    function show($id)
    {

        $contact = $this->contactService->find($id);
        return view('admin.contacts.show', compact('contact'));
    }


    function update(Request $request, $id)
    {
        try {

            $status = $request->input('status');
            $this->contactService->update($id, $status);
            return response()->json([
                'message' => "Cập nhật trạng thái thành công!"
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ]);
        }
    }
    public function delete($id)
    {
        try {
            $this->contactService->delete($id);
            $mess = 'Xóa  thành công';
            return redirect()->back()->with('success', $mess);
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
