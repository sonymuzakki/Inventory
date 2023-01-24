<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\Divisi;
use App\Models\history;
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
                'user_id' => $request->user_id,
                'lokasi_id' => $request->lokasi_id,
                'divisi_id' => $request->divisi_id,
                'jenis_id' => $request->jenis_id,
                'hostname' => $request->hostname,
                'merk' => $request->merk,
                'Processor' => $request->Processor,
                'ram' => $request->ram,
                'grafik' => $request->grafik,
                'ssd' => $request->ssd,
                'os' => $request->os,
                'Office' => $request->Office,
                'akunOffice' => $request->akunOffice,
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
            $divisi = Divisi::all();
            $user = user::all();
            $lokasi = Lokasi::all();
            $jenis = Jenis::all();
            return view('Backend.inventoryEdit',compact('inventaris','divisi','lokasi','jenis','user'));
        }

        public function InventarisUpdate(Request $request){

            $id = $request->id;

            Inventory::findOrFail($id)->update([
                'user_id' => $request->user_id,
                'lokasi_id' => $request->lokasi_id,
                'divisi_id' => $request->divisi_id,
                'jenis_id' => $request->jenis_id,
                'hostname' => $request->hostname,
                'merk' => $request->merk,
                'Processor' => $request->Processor,
                'ram' => $request->ram,
                'grafik' => $request->grafik,
                'ssd' => $request->ssd,
                'os' => $request->os,
                'Office' => $request->Office,
                'akunOffice' => $request->akunOffice,
                'hardisk' => $request->hardisk,
                'updated_at' => Auth::user()->id,
                'updated_at' => Carbon::now()

            ]);

             $notification = array(
                'message' => 'Inventaris Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('invetaris.all',compact('inventory'))->with($notification);

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
            $inventaris = Inventory::findOrFail($id);
            $divisi = Divisi::all();
            $user = user::all();
            $lokasi = Lokasi::all();
            $jenis = Jenis::all();
            $history = history::where('inventory_id',$id)->get();

            return view('Backend.inventoryDetails',compact('inventaris','divisi','lokasi','user','jenis','history'));
        }








}