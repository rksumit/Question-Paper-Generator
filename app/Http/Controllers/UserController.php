<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', User::class);
//        if(auth()->user()->is_admin != 1) {
//            abort(403);
//        }
        $users = User::where('is_admin', 1)->paginate();
        return view('users.index', compact('users'));
    }
}
