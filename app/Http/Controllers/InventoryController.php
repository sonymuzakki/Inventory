<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Divisi;
use App\Models\Lokasi;
use App\Models\Jenis;
use App\Models\User;
use Carbon\Carbon;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class InventoryController extends Controller
{
        public function InventarisAll(){
            $inventory = Inventory::latest()->get();
            return view('Backend.InventoryAll',compact('inventory'));
        }

        public function InventarisAdd(){
            $divisi = Divisi::all();
            $user = user::all();
            $lokasi = Lokasi::all();
            $jenis = Jenis::all();
            return view('Backend.inventoryAdd',compact('divisi','lokasi','jenis','user'));
        }

        public function InventarisStore(Request $request ){
            $inventory = inventory::insert([
                'hostname' => $request->hostname,
                'ram' => $request->ram,
                'hardisk' => $request->hardisk,
                'created_by' => Auth::user()->id,
                'created_at' => Carbon::now()
            ]);
            $notification = array (
                'message' => 'Inventory Insert Successfully',
                'alert-type' => 'success',
            );
            // return view('Backend.InventoryAll',compact('inventory', 'notification'));
            return redirect()->route('invetaris.all')->with($notification);
        }

        public function InventarisEdit($id){
            $inventaris = Inventory::findOrFail($id);
            return view('Backend.inventoryEdit',compact('inventaris'));
        }

        public function InventarisUpdate(Request $request){

            $id = $request->id;

            Inventory::findOrFail($id)->update([
                'hostname' => $request->hostname,
                'ram' => $request->ram,
                'hardisk' => $request->hardisk,
                'updated_at' => Carbon::now(),

            ]);

             $notification = array(
                'message' => 'Inventaris Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('invetaris.all')->with($notification);

        }// End Method

        public function InventarisDelete($id){
            Inventory::findOrFail($id)->delete();

             $notification = array(
                  'message' => 'Inventory Deleted Successfully',
                  'alert-type' => 'success'
              );

              return redirect()->back()->with($notification);

          }

          public function InventarisDetails($id){
            $inventaris = Inventory::find($id);
            return view('Backend.inventoryDetails',compact('inventaris'));
        }







}
