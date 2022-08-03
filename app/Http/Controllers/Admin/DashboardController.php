<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};

class DashboardController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('dashboard');
    }

    /**
     * @return Application|Factory|View
     */
    public function broadcast(): View|Factory|Application
    {
        return view('broadcast');
    }

    /**
     * @return Factory|View|Application
     */
    public function sendmail(): Factory|View|Application
    {
        return view('sendmail');
    }

    /**
     * @return Factory|View|Application
     */
    public function changePassword(): Factory|View|Application
    {
        return view('change-password');
    }

    /**
     * @return Factory|View|Application
     */
    public function viewLog(): Factory|View|Application
    {
        return view('view-log');
    }
}
