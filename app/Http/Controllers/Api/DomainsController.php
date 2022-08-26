<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\Mailbox;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DomainsController extends Controller
{
    public function index()
    {
        $domains = Domain::all();

        return response()->json($domains);
    }
}
