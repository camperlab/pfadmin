<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AliasDomain;
use App\Models\Domain;
use App\Models\DomainAdmins;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AdminsController extends Controller
{

    /**
     * @return Factory|View|Application
     */
    public function index(): Factory|View|Application
    {
        $admins = Admin::all()->sortDesc();

        return view('admins.index', [
            'admins' => $admins
        ]);
    }

    /**
     * @return Factory|View|Application
     */
    public function create(): Factory|View|Application
    {
        $domains = Domain::all();

        return view('admins.create', [
            'domains' => $domains
        ]);
    }

    /**
     * @param Request $request
     * @return Factory|View|Application
     * @throws ValidationException
     */
    public function edit(Request $request): Factory|View|Application
    {
        $this->validate($request, [
            'username' => 'required|string'
        ]);

        if ($admin = Admin::where('username', $request->get('username'))->first()) {

            $domains = Domain::all();

            return view('admins.edit', [
                'admin' => $admin,
                'domains' => $domains
            ]);
        }

        return abort(404);
    }

    /**
     * @param Request $request
     * @return Redirector|RedirectResponse|Application
     * @throws ValidationException
     */
    public function store(Request $request): Redirector|RedirectResponse|Application
    {

        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'required|confirmed',
            'superadmin' => 'nullable',
            'active' => 'nullable'
        ]);

        $admin = new Admin();
        $admin->username = $request->get('admin');
        $admin->password = Hash::make($request->get('password'));
        $admin->superadmin = $request->get('superadmin') ?? 0;
        $admin->active = $request->get('active') ?? 0;
        $admin->save();

        if ($domains = $request->get('domains')) {
            foreach ($domains as $domain) {
                $admin->domains()->create(['domain' => $domain]);
            }
        }

        return redirect('admins')->with('status', 'Form Data Has Been Inserted');
    }

    /**
     * @param Request $request
     * @return Application|Redirector|RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request): Redirector|RedirectResponse|Application
    {
        $this->validate($request, [
            'username' => 'required|string',
            'password' => 'nullable|confirmed',
            'superadmin' => 'nullable',
            'active' => 'nullable',
            'domains' => 'nullable|array'
        ]);

        if ($admin = Admin::where('username', $request->get('username'))->first()) {

            if ($request->get('password')) {
                $admin->password = Hash::make($request->get('password'));
            }

            $admin->superadmin = $request->has('superadmin');
            $admin->active = $request->has('active');
            $admin->save();

            if ($domains = $request->get('domains')) {
                $admin->domains()->delete();
                foreach ($domains as $domain) {
                    $admin->domains()->create(['domain' => $domain]);
                }
            }

            return redirect('admins')->with('status', 'Form Data Has Been Inserted');
        }
    }

    /**
     * @param Request $request
     * @return Redirector|Application|RedirectResponse
     * @throws ValidationException
     */
    public function delete(Request $request): Redirector|Application|RedirectResponse
    {
        $this->validate($request, [
            'username' => 'required|email'
        ]);

        if ($admin = Admin::where('username', $request->get('username'))->first()) {
            $admin->delete();
            return redirect('admins')->with('status', 'Form Data Has Been Inserted');
        }

        return redirect('admins')->with('status', 'Fuck');
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector|void
     * @throws ValidationException
     */
    public function toggleActive(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string'
        ]);

        if ($admin = Admin::where('username', $request->get('username'))->first()) {
            $admin->update(['active' => !$admin->active]);

            return redirect('admins')->with('status', 'Form Data Has Been Inserted');
        }
    }
}
