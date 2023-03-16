<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\Mailbox;
use App\Repositories\MailboxRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class MailboxesController extends Controller
{

    private MailboxRepository $mailboxRepository;

    public function __construct(MailboxRepository $mailboxRepository)
    {
        $this->mailboxRepository = $mailboxRepository;
    }

    /**
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $domains = Domain::all()->sortDesc();

        return view('mailboxes.create', [
            'domains' => $domains
        ]);
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function store(Request $request): Redirector|RedirectResponse|Application
    {
        $this->validate($request, [
            'username' => 'required|string',
            'domain' => 'required|string',
            'password' => 'required|string|confirmed',
            'name' => 'nullable|string',
            'quota' => 'nullable|numeric',
            'active' => 'nullable',
            'send_welcome' => 'nullable',
            'other_email' => 'nullable|string'
        ]);

        $this->mailboxRepository->create([
            'username' => $request->get('username'),
            'domain' => $request->get('domain'),
            'password' => $request->get('password'),
            'name' => $request->get('name'),
            'active' => $request->get('active') === 'on' ?? false,
            'send_welcome' => $request->get('send_welcome') ?? null
        ]);

        return redirect('virtual')->with('status', 'Form Data Has Been Inserted');
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector|void
     * @throws ValidationException
     */
    public function delete(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string'
        ]);

        if ($mailbox = Mailbox::where('username', $request->get('username'))->first()) {
            $mailbox->delete();

            // TODO delete mailbox physically

            return redirect('virtual')->with('status', 'Form Data Has Been Inserted');
        }
    }
}
