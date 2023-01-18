<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Jenis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class JenisController extends Controller
{
    public function jenisAll(){
        $jenis = Jenis::all();
        return view('Backend.Jenis.jenis_all',compact('jenis'));
    }

    public function jenisAdd(){
        $jenis = jenis::all();
        return view('Backend.Jenis.jenisAdd',compact('jenis'));
    }

    public function JenisStore(Request $request ){

        $jenis = jenis::insert([
            'jenis' => $request->jenis,
            // 'created_by' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        $notification = array (
            'message' => 'Inventory Insert Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('jenis.all')->with($notification);
    }

    public function jenisDelete($id){
        Jenis::findOrFail($id)->delete();

         $notification = array(
              'message' => 'Jenis Deleted Successfully',
              'alert-type' => 'success'
          );
          return redirect()->back()->with($notification);
        }

        public function jenisDetails($id){
            $jenis = Jenis::findOrFail($id);
            return view('Backend.Jenis.jenisDetails',compact('jenis'));
        }



}