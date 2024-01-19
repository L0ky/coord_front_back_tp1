<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(Request $request)
    {
        $validate = $request->validate([
            'user_id' => 'required|integer'
        ]);
        
        $this->authorize('admin', [User::class, $validate['user_id']]);

        return User::all();
    }
}
