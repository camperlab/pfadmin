<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mailbox;
use Illuminate\Http\JsonResponse;

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
}