<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alias;
use App\Models\Domain;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;

class AliasesController extends Controller
{
    public function create(): Factory|View|Application
    {

        $domains = Domain::where('active', 1)->get();

        return view('aliases.create', [
            'domains' => $domains
        ]);
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector|void
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'alias' => 'required|string',
            'domain' => 'required|string',
            'to' => 'required|string'
        ]);

        if ($emails = preg_split('/\r\n|\r|\n/', $request->get('to'))) {

            $alias = $request->get('alias') !== '*' ? $request->get('alias') : '';

            Alias::create([
                'address' => $alias . '@' . $request->get('domain'),
                'goto' => implode(',', $emails),
                'domain' => $request->get('domain')
            ]);

            return redirect('virtual')->with('status', 'Form Data Has Been Inserted');
        }
    }
}
