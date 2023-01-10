<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    public function profile(){
        $id = Auth::user()->id;
        $adminData = user::find($id);
        return view ('admin.admin_profiles_view', compact('adminData'));
    }

    public function editProfile(){
        $id =Auth::user()->id;
        $editData= user::find($id);
        return view ('admin.admin_profile_edit',compact('editData'));
    }

    public function storeProfile(Request $request){
        $id= Auth::user()->id;
        $data = user::find ($id);
        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;

        $data->save();

        return redirect()->route('admin.profile');
    }

    public function destroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}