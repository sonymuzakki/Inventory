<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
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
            return view('Backend.inventoryAdd');
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

        // public function InventarisUpdate(Request $request){

        //     $sullier_id = $request->id;

        //         Inventory::findOrFail($sullier_id)->update([
        //         'hostname' => $request->hostname,
        //         'ram' => $request->ram,
        //         'hardisk' => $request->hardisk,
        //         'updated_by' => Auth::user()->id,
        //         'updated_at' => Carbon::now(),

        //     ]);

        //      $notification = array(
        //         'message' => 'Inventaris Updated Successfully',
        //         'alert-type' => 'success'
        //     );

        //     return redirect()->route('invetaris.all')->with($notification);

        // }

        // public function InventarisUpdate(Request $request, $id){
        //     $data = Inventory::find($id);
        //     $data->update($request->all);
        //     return redirect()->route('invetaris.all');
        // }

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







}
