<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureRolesController extends Controller
{
    public function dashboard() {
        switch (Auth::user()->roles == 'ADMIN') {
            case true:
                return redirect(route('admin.dashboard'));
                break;
            
            default:
                return redirect(route('customer.dashboard'));
                break;
        }
    }
}
