<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\user;
use App\Models\history;
use App\Models\Inventory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    public function HistoryAll(){
        $allData = history::all();
        return view('Backend.Request.historyAll',compact('allData'));
    }

    public function RequestAdd(){
        $history = history::all();
        $inventory = inventory::all();
        // $user = user::all();
        return view('Backend.Request.requestAdd',compact('inventory','history'));
    }

    public function RequestStore(Request $request ){
        $history = history::insert([
            'inventory_id' => $request->inventory_id,
            'pengerjaan' => $request->pengerjaan,
            'status' => $request->status,
            'created_by' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        $notification = array (
            'message' => 'Inventory Insert Successfully',
            'alert-type' => 'success',
        );
        // return view('Backend.InventoryAll',compact('inventory', 'notification'));
        return redirect()->route('request.all')->with($notification);
    }
}