<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\history;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index(){
        $history = history::all();
        $inventory = Inventory::all();
        return view('Frontend.index',compact('history','inventory'));
    }

    public function RequestStore(Request $request){

        history::insert([

            'inventory_id' => $request->inventory_id,
            // 'inventory_id' => $request->jenis_id,
            'laporan' => $request->laporan,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now(),

        ]);

        $notification = array(
            'message' => 'Product Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('users')->with($notification);
}
}
