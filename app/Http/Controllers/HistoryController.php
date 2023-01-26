<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Carbon\Carbon;
use App\Models\user;
use App\Models\history;
use App\Models\Inventory;
use App\Models\Jenis;
use App\Models\proses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function HistoryAll(){
        $allData = history::latest()->get();
        $inventory = Inventory::all();
        $user   = user::all();
        return view('Backend.Request.historyAll',compact('user','allData','inventory'));
    }

    public function RequestAdd(){
        $history = history::all();
        $inventory = inventory::all();
        $user = user::all();
        $divisi = Divisi::all();
        $jenis = Jenis::all();
        return view('Backend.Request.requestAdd',compact('inventory','history','user','divisi','jenis'));
    }

    // public function RequestStore(Request $request ){
    //     $history = history::insert([
    //         'inventory_id' => $request->inventory_id,
    //         // 'inventory_id' => $request->jenis_id,
    //         'laporan' => $request->laporan,
    //         // 'status' => $request->status,
    //         // 'created_by' => Auth::user()->id,
    //         'created_at' => Carbon::now()

    //     ]);
    //     $notification = array (
    //         'message' => 'Inventory Insert Successfully',
    //         'alert-type' => 'success',
    //     );
    //     // return view('Backend.InventoryAll',compact('inventory', 'notification'));
    //     return redirect()->route('request.all')->with($notification);
    // }

    public function RequestStore(Request $request){

            history::insert([

                'inventory_id' => $request->inventory_id,
                'inventory_id' => $request->jenis_id,
                'laporan' => $request->laporan,
                'created_by' => Auth::user()->id,
                'created_at' => Carbon::now(),

            ]);

            $notification = array(
                'message' => 'Product Inserted Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('request.all')->with($notification);
    }

    public function prosesAll(){
        $allData = proses::latest()->get();;
        return view('Backend.Proses.prosesAll',compact('allData'));
    }

    public function prosesAdd(){
        $proses = proses::all();
        $history = history::all();
        $inventory = inventory::all();
        $user = user::all();
        $divisi = Divisi::all();
        $jenis = Jenis::all();
        return view('Backend.Proses.prosesAdd',compact('inventory','history','user','divisi','jenis'));
    }
}