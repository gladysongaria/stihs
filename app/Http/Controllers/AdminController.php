<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller

{
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User Logout Successfully',
            'alert-type' => 'success'
        );

        return redirect('/login')->with($notification);
    }

    public function profile()
    {
        if (Auth::check()) {
            $id = Auth::user()->id;
            $adminData = User::find($id);
            return view('admin.admin_profile_view', compact('adminData'));
        } else {
            // Handle the case where the user is not authenticated
            // For example, redirect them to the login page
            return redirect()->route('login'); // Change 'login' to your login route name
        }
    }

    public function EditProfile() {
        $id = Auth::user()->id;
        $editData = User::find($id);

        return view ('admin.admin_profile_edit',compact('editData'));
    }

    public function StoreProfile(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->first_name = $request->first_name;
        // $data->middle_initial = $request->middle_initial;
        $data->last_name = $request->last_name;
        $data->email = $request->email;
        // $data->user_name = $request->user_name;
        $data->profile_image = $request->profile_image;

        if($request->file('profile_image')){
            $file=$request->file('profile_image');


            $filename= date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/profile_images'), $filename);
        $data['profile_image'] = $filename;
    }
    $data->save();

    $notification = array(
        'message' => 'Your account has been updated.',
        'alert-type' => 'info'
    );

    return redirect()->route('admin.profile')->with($notification);
}

public function ChangePassword(){
    return view('admin.admin_change_password');
}
public function UpdatePassword(Request $request){
    $validateData = $request->validate([
        'oldpassword' => 'required',
        'newpassword' => 'required',
        'confirm_password' => 'required|same:newpassword',
    ]);

     $hashedPassword = Auth::user()->password;
     if(Hash::check($request->oldpassword,$hashedPassword)){
        $users = User::find(Auth::id());
        $users->password = bcrypt($request->newpassword);
        $users->save();


        session()->flash('message','Password Updated Successfully');
        return redirect()->back();

    } else {
        session()->flash('message','Old Password is not Match');
        return redirect()->back();
    }



}


}





