<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            return $this->dashboardAdmin();
        } elseif ($user->hasRole('user')) {
            return $this->dashboardUser();
        } else {
            abort(403, 'Unauthorized action.');
        }
    }

    public function dashboardAdmin()
    {
        return view('admin.dashboard', [
        ]);
    }

    public function dashboardUser()
    {
        return view('user.dashboard', [
        ]);
    }

}
