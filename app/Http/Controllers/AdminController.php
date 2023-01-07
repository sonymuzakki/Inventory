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

    public function destroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
