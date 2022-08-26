<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use App\Models\Mailbox;
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
