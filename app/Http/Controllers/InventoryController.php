<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Carbon\Carbon;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InventoryController extends Controller
{
    // public function InventoryAll(){
    //     $inventory = Inventory::latest();
    //     return view('Backend.InventoryAll',compact('inventory'));
    // }

    // public function InventoryAdd(){
    //     return view('Backend.inventoryAdd');
    // }

    // public function StoreInventory(Request $request){
    //     Inventory::insert([
    //         'hostname' => $request->hostname,
    //         'ram' =>$request->ram,
    //         'hardisk' => $request->hardisk,
    //         'created_at' => Carbon::now(),

    //     ]);

    //         $notification = array (
    //             'message' => 'Inventory Insert Successfully',
    //             'alert-type' => 'success'
    //         );
    //         return redirect()->route('data.inventaris')->with($notification);
    //     }
        public function InventarisAll(){
            $inventory = Inventory::latest()->get();
            return view('Backend.InventoryAll',compact('inventory'));
        }


}
