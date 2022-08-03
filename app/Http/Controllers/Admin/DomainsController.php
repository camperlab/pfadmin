<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{View, Factory};
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;

class DomainsController extends Controller
{
    public function index()
    {
        $domains = Domain::all()->sortDesc();

        return view('domains.index', [
            'domains' => $domains
        ]);
    }

    public function create()
    {
        return view('domains.create');
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function store(Request $request): Redirector|RedirectResponse|Application
    {
        $this->validate($request, [
            'domain' => 'required',
            'description' => 'nullable|string',
            'aliases' => 'nullable|numeric',
            'mailboxes' => 'nullable|numeric',
            'active' => 'nullable',
            'default_aliases' => 'nullable',
            'pass_expires' => 'nullable'
        ]);

        $domain = new Domain();
        $domain->domain = $request->get('domain');
        $domain->description = $request->get('description');
        $domain->aliases = $request->get('aliases') ?? 0;
        $domain->mailboxes = $request->get('mailboxes') ?? 0;
        $domain->backupmx = $request->has('backupmx');
        $domain->active = $request->has('active');

        if ($request->has('default_alias')) {
            // TODO create aliases for this domain
        }

        $domain->save();

        return redirect('domains')->with('status', 'Form Data Has Been Inserted');
    }

    /**
     * @param Request $request
     * @return Application|Factory|View|never
     * @throws ValidationException
     */
    public function edit(Request $request): View|Factory|Application
    {
        $this->validate($request, [
            'domain' => 'required|string'
        ]);

        if ($domain = Domain::where('domain', $request->get('domain'))->first()) {
            return view('domains.edit', [
                'domain' => $domain
            ]);
        }

        return abort(404);
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector|void
     * @throws ValidationException
     */
    public function delete(Request $request)
    {
        $this->validate($request, [
            'domain' => 'required'
        ]);

        if ($domain = Domain::where('domain', $request->get('domain'))->first()) {

            $domain->delete();

            return redirect('domains')
                ->with('status', 'Form Data Has Been Inserted');
        }
    }
}
