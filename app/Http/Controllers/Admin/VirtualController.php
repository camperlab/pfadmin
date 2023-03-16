<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alias;
use App\Models\AliasDomain;
use App\Models\Mailbox;
use App\Repositories\MailboxRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class VirtualController extends Controller
{

    private MailboxRepository $mailboxRepository;

    public function __construct(MailboxRepository $mailboxRepository)
    {
        $this->mailboxRepository = $mailboxRepository;
    }

    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $aliasDomains = AliasDomain::all()->sortDesc();
        $aliases = Alias::all()->sortDesc();
        $mailboxes = Mailbox::all()->sortDesc();

        return view('virtual.index', [
            'aliasDomains' => $aliasDomains,
            'aliases' => $aliases,
            'mailboxes' => $mailboxes
        ]);
    }
}
