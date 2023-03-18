<?php

namespace App\Http\Controllers;


use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use App\Models\Inventory;
use App\Models\Divisi;
use App\Models\history;
use App\Models\Lokasi;
use App\Models\Jenis;
use App\Models\User;
use Carbon\Carbon;

class InventoryController extends Controller
{
        public function InventarisAll(){
            $inventory = Inventory::latest()->get();
            return view('Backend.InventoryAll',compact('inventory'));
        }

        public function InventarisAdd(){
            // $divisi = Divisi::all();
            $user = user::with('divisi','lokasi')->get();
            // $lokasi = Lokasi::all();
            $jenis = Jenis::all();
            return view('Backend.inventoryAdd',compact('jenis','user'));
        }

        public function InventarisStore(Request $request ){
            $inventory = inventory::insert([
                'user_id' => $request->user_id,
                // 'lokasi_id' => $request->lokasi_id,
                // 'divisi_id' => $request->divisi_id,
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
                'legalos' => $request->legalos,
                'internet' => $request->internet,
                'ipaddress' => $request->ipaddress,
                'amp' => $request->amp,
                'umbrella' => $request->umbrella,
                'anydeskid' => $request->anydeskid,
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
            $user = user::all();
            $jenis = Jenis::all();
            return view('Backend.inventoryEdit',compact('inventaris','jenis','user'));
        }

        public function InventarisUpdate(Request $request,$id){
            //validasi inputan dari form
                $this->validate($request, [
                    'user_id' => 'required',
                    'jenis_id' => 'required',
                    'hostname' => 'required',
                    'os' => 'required',
                    'merk' => 'required',
                    'Office' => 'required',
                    'Processor' => 'required',
                    'akunOffice' => 'required',
                    'ram' => 'required',
                    'ssd' => 'required',
                    'grafik' => 'required',
                    'legalos' => 'required',
                    'hardisk' => 'required',
                    'internet' => 'required',
                    'amp' => 'required',
                    'umbrella' => 'required',
                    'ipaddress' => 'required',
                    'anydeskid' => 'required'
                ]);

                //mengambil data inventaris dari database
                $inventaris = Inventory::findOrFail($id);

                //mengupdate data inventaris dengan data baru dari inputan form
                $inventaris->user_id = $request->user_id;
                $inventaris->jenis_id = $request->jenis_id;
                $inventaris->hostname = $request->hostname;
                $inventaris->os = $request->os;
                $inventaris->merk = $request->merk;
                $inventaris->Office = $request->Office;
                $inventaris->Processor = $request->Processor;
                $inventaris->akunOffice = $request->akunOffice;
                $inventaris->ram = $request->ram;
                $inventaris->ssd = $request->ssd;
                $inventaris->grafik = $request->grafik;
                $inventaris->legalos = $request->legalos;
                $inventaris->hardisk = $request->hardisk;
                $inventaris->internet = $request->internet;
                $inventaris->amp = $request->amp;
                $inventaris->umbrella = $request->umbrella;
                $inventaris->ipaddress = $request->ipaddress;
                $inventaris->anydeskid = $request->anydeskid;

                //jika kolom tidak diubah, maka ambil nilai dari database sebelumnya
                if (!$inventaris->isDirty('user_id')) {
                    $inventaris->user_id = $inventaris->getOriginal('user_id');
                }

                //simpan perubahan data pada inventaris
                $inventaris->save();

                //set notifikasi untuk ditampilkan pada halaman selanjutnya
                $notification = array(
                    'message' => 'Inventaris Updated Successfully',
                    'alert-type' => 'success'
                );

                //kembalikan user ke halaman inventaris dengan notifikasi
                return redirect()->route('invetaris.all');
            }
        // public function InventarisUpdate(Request $request, $id){

        //     // $id = $request->id;
        //     //validasi inputan dari form
        //     $this->validate($request,$id, [
        //         'user_id' => 'required',
        //         'jenis_id' => 'required',
        //         'hostname' => 'required',
        //         'os' => 'required',
        //         'merk' => 'required',
        //         'Office' => 'required',
        //         'Processor' => 'required',
        //         'akunOffice' => 'required',
        //         'ram' => 'required',
        //         'ssd' => 'required',
        //         'grafik' => 'required',
        //         'legalos' => 'required',
        //         'hardisk' => 'required',
        //         'internet' => 'required',
        //         'amp' => 'required',
        //         'umbrella' => 'required',
        //         'ipaddress' => 'required',
        //         'anydeskid' => 'required'
        //     ]);

        //     // $this->InventarisUpdate($request, $id);

        //     //mengambil data inventaris dari database
        //     $inventaris = Inventory::findOrFail($id);

        //     //mengupdate data inventaris dengan data baru dari inputan form
        //     $inventaris->user_id = $request->user_id;
        //     $inventaris->jenis_id = $request->jenis_id;
        //     $inventaris->hostname = $request->hostname;
        //     $inventaris->os = $request->os;
        //     $inventaris->merk = $request->merk;
        //     $inventaris->Office = $request->Office;
        //     $inventaris->Processor = $request->Processor;
        //     $inventaris->akunOffice = $request->akunOffice;
        //     $inventaris->ram = $request->ram;
        //     $inventaris->ssd = $request->ssd;
        //     $inventaris->grafik = $request->grafik;
        //     $inventaris->legalos = $request->legalos;
        //     $inventaris->hardisk = $request->hardisk;
        //     $inventaris->internet = $request->internet;
        //     $inventaris->amp = $request->amp;
        //     $inventaris->umbrella = $request->umbrella;
        //     $inventaris->ipaddress = $request->ipaddress;
        //     $inventaris->anydeskid = $request->anydeskid;

        //     //simpan perubahan data pada inventaris
        //     $inventaris->save();

        //     //set notifikasi untuk ditampilkan pada halaman selanjutnya
        //     $notification = array(
        //         'message' => 'Inventaris Updated Successfully',
        //         'alert-type' => 'success'
        //     );

        //     //kembalikan user ke halaman inventaris dengan notifikasi
        //     return redirect()->route('invetaris.all')->with($notification);
        // }
        // public function InventarisUpdate(Request $request, $id)
        // {
        //     $inventory = Inventory::findOrFail($id);

        //     $inventory->update([
        //         'user_id' => $request->user_id,
        //         'lokasi_id' => $request->lokasi_id,
        //         'divisi_id' => $request->divisi_id,
        //         'jenis_id' => $request->jenis_id,
        //         'hostname' => $request->hostname,
        //         'merk' => $request->merk,
        //         'Processor' => $request->Processor,
        //         'ram' => $request->ram,
        //         'grafik' => $request->grafik,
        //         'ssd' => $request->ssd,
        //         'os' => $request->os,
        //         'Office' => $request->Office,
        //         'akunOffice' => $request->akunOffice,
        //         'hardisk' => $request->hardisk,
        //         'updated_by' => Auth::user()->id,
        //         'updated_at' => Carbon::now()

        //     ]);

        //     $notification = array(
        //         'message' => 'Inventory Updated Successfully',
        //         'alert-type' => 'success'
        //     );

        //     return redirect()->route('invetaris.all')->with($notification);
        // }

//         public function inventarisUpdate(Request $request, $id)
// {
//     // Mengambil data inventaris berdasarkan ID
//         $inventory = Inventory::findOrFail($id);

//         // Mengisi nilai pada model terkait User
//         $user = $inventory->user;
//         $user->name = $request->input('user_id');
//         $user->save();

//         $divisi= $inventory->divisi;
//         $divisi->nama = $request->input('divisi_id');
//         $divisi->save();

//         $lokasi = $request->lokasi;
//         $lokasi->nama = $request->input('lokasi_id');
//         $lokasi->save();

//         $jenis = $request->jenis;
//         $jenis->nama = $request->input('jenis_id');
//         $jenis->save();

//         // Mengisi nilai pada model Inventory
//         $inventory->hostname = $request->input('hostname');
//         $inventory->merk = $request->input('merk');
//         $inventory->processor = $request->input('processor');
//         $inventory->ram = $request->input('ram');
//         $inventory->grafik  = $request->input('grafik');
//         $inventory->ssd  = $request->input('ssd');
//         $inventory->os  = $request->input('os');
//         $inventory->office  = $request->input('office');
//         $inventory->akunOffice  = $request->input('akunOffice');
//         $inventory->save();

//         $notification = array(
//             'message' => 'Inventaris updated successfully!',
//             'alert-type' => 'success'
//         );
//         return redirect()->route('inventaris.all')->with($notification);
//     }

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
            $user = user::all();
            $jenis = Jenis::all();
            $history = history::where('inventory_id',$id)->get();

            return view('Backend.inventoryDetails',compact('inventaris','user','jenis','history'));
        }









}