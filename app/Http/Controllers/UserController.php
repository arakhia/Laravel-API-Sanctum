<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * To assign roles for the web application
     */
    /*public function assignRoles(Request $request)
    {
        $user = User::findOrFail($request->userId);

        foreach($request->roles as $roleId){
            $role = Role::findOrFail($roleId);
            $user->roles()->attach($role);
        }
    }*/

    /**
     * To generate Tokens for the REST API
     */
    public function generateToken(Request $request)
    {
        $user = User::findOrFail($request->userId);

        $token = $user->createToken('access_token', $request->permissions);

        return response()->json([
            "user" => $user,
            "token" => $token,
            "permissions" => array_values($request->permissions)
        ]);
    }
}
