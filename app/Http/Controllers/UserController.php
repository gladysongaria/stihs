<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profiles;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        if (Auth::user()->usertype == 'Admin') {
            $users = User::with('department')->get();
            $departments = Department::all();

            $randomPassword = $this->generateRandomPassword();
            return view('users.index', compact('users', 'departments', 'randomPassword'));
        } else {
            return view('admin.index');
        }
    }

    public function generateRandomPassword($length = 10)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $password = '';

        for ($i = 0; $i < $length; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $password .= $characters[$index];
        }

        return $password;
    }

    public function store(Request $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'middle_initial' => $request->middle_initial,
            'email' => $request->email,
            'usertype' => $request->usertype,
            'department_id' => $request->department_name,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back()->with('success', 'User added successfully');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'middle_initial' => 'nullable|string|max:1',
        'email' => 'required|email',
        'usertype' => 'required|string',
        'department_id' => 'nullable|exists:departments,id', // Assuming departments table exists
    ]);

    $user = User::findOrFail($id);

    $user->update([
        $user->first_name = $request->input('first_name'),
        $user->middle_initial = $request->input('middle_initial'),
        $user->last_name = $request->input('last_name'),
        $user->email = $request->input('email'),
        $user->user_type = $request->input('user_type'),
        $user->department_id = $request->input('department_id'),
        $user->password = Hash::make($request->input('password')),
        $user->save(),

    ]);

    return redirect()->back()->with('success', 'User successfully updated.');

}

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success', 'User deleted successfully');
    }
}
