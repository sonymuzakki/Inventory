<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\pinjam;
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

        $notification = array(
          'message' => 'Admin Profile Updated Successfully',
          'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }

    public function destroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        $notification = array(
            'message' => 'User Logout Successfully',
            'alert-type' => 'success'
          );

        return redirect('')->with($notification);
    }

    public function formAll(){
        $data = pinjam::all();
        return view('Backend.Form.pinjamAll',compact('data'));
    }

    public function formElektronik(){
        $data = pinjam::all();
        return view ('Backend.Form.pinjamElektronik',compact('data'));

    }

    public function addData(Request $request)
{

    $request->validate([
        'nama_alat' => 'required',
        'peminjam' => 'required',
        'jabatan' => 'required',
        'tanggal_pinjam' =>'required',
        'tanggal_kembali' =>'required',
        'lama_pinjam' =>'required',
        'keperluan' =>'required',
    ]);
    $data = new pinjam();
    $data->nama_alat = $request->input('nama_alat');
    $data->peminjam = $request->input('peminjam');
    $data->jabatan = $request->input('jabatan');
    $data->tanggal_pinjam = $request->input('tanggal_pinjam');
    $data->tanggal_kembali = $request->input('tanggal_kembali');
    $data->lama_pinjam = $request->input('lama_pinjam');
    $data->keperluan = $request->input('keperluan');
    $data->save();

    return response()->json(['success' => 'Data berhasil ditambahkan.']);
}
}