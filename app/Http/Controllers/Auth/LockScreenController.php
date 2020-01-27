<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LockScreenController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // dd($user();
        return view('_Administrator.users.lock-screen');
    }
}
