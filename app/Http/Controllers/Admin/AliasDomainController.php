<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AliasDomain;
use App\Models\Domain;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;

class AliasDomainController extends Controller
{
    /**
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        $domains = Domain::where('active', 1)->get();

        return view('alias-domain.create', [
            'domains' => $domains
        ]);
    }

    /**
     * @param Request $request
     * @return Application|Factory|View|never
     * @throws ValidationException
     */
    public function edit(Request $request): View|Factory|Application
    {
        $this->validate($request, [
            'alias_domain' => 'required'
        ]);

        if ($aliasDomain = AliasDomain::where('alias_domain', $request->get('alias_domain'))->first()) {
            return view('alias-domain.edit', [
                'aliasDomain' => $aliasDomain
            ]);
        }

        return abort(404);
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     * @throws ValidationException
     */
    public function store(Request $request): Redirector|RedirectResponse|Application
    {
        $this->validate($request, [
            'alias_domain' => 'required|different:target_domain|unique:alias_domain',
            'target_domain' => 'required|different:alias_domain|unique:alias_domain',
            'active' => 'nullable'
        ]);

        AliasDomain::create([
            'alias_domain' => $request->get('alias_domain'),
            'target_domain' => $request->get('target_domain'),
            'active' => $request->get('active') ?? 0
        ]);

        return redirect('virtual')->with('status', 'Form Data Has Been Inserted');
    }
}
