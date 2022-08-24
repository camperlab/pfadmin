<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mailbox;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class MailboxesController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $mailboxes = Mailbox::all();

        return response()->json($mailboxes);
    }

    public function show(Request $request)
    {
        $this->validate($request, [

        ]);
    }

    public function create(Request $request)
    {
        $this->validate($request, [

        ]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [

        ]);
    }

    public function delete()
    {

    }
}
