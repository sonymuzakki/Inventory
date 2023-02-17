<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Jenis;
use App\Models\Divisi;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class MasterController extends Controller
{
    public function jenisAll(){
        $jenis = Jenis::all();
        return view('Backend.Master.Jenis.jenis_all',compact('jenis'));
    }

    public function jenisAdd(){
        $jenis = jenis::all();
        return view('Backend.Master.Jenis.jenisAdd',compact('jenis'));
    }

    public function JenisStore(Request $request ){

        $jenis = jenis::insert([
            'nama' => $request->nama,
            // 'created_by' => Auth::user()->id,
            'created_at' => Carbon::now()
        ]);
        $notification = array (
            'message' => 'Inventory Insert Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('jenis.all')->with($notification);
    }

    public function jenisEdit($id){
        $jenis = jenis::findOrFail($id);

        return view('Backend.Master.Jenis.jenisEdit',compact('jenis'));
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
            return view('Backend.Master.Jenis.jenisDetails',compact('jenis'));
        }

        public function jenisUpdate(Request $request){
            $id = $request->id;

            jenis::findOrFail($id)->update([
                'nama' => $request->nama,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Inventaris Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('jenis.all')->with($notification);
        }


        // <!-- Master Divisi -->

        public function DivisiAll(){
            $divisi = divisi::all();
            return view('Backend.Master.divisi.divisiAll',compact('divisi'));
        }

        public function divisiAdd(){
            $divisi = divisi::all();
            return view('Backend.Master.divisi.divisiAdd',compact('divisi'));
        }

        public function divisiStore(Request $request){

            // $id = IdGenerator::generate(['divisi' => 'divisi', 'length' => 3, 'prefix' => date('D-')]);

           divisi::insert([
                'nama' => $request->nama,
                // 'created_by' => Auth::user()->id,
                'created_at' => Carbon::now()
            ]);
            $notification = array (
                'message' => 'Divisi Insert Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('divisi.all')->with($notification);
        }

        public function divisiDelete($id){
            divisi::findOrFail($id)->delete();

             $notification = array(
                  'message' => 'Divisi Deleted Successfully',
                  'alert-type' => 'success'
              );
              return redirect()->back()->with($notification);
        }

        public function divisiEdit($id){
            $divisi = Divisi::findOrFail($id);

            return view('Backend.Master.divisi.divisiEdit',compact('divisi'));
        }

        public function DivisiUpdate(Request $request){
            $id = $request->id;

            divisi::findOrFail($id)->update([
                'nama' => $request->nama,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Inventaris Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('divisi.all')->with($notification);
        }



        public function LokasiAll(){
            $lokasi = lokasi::all();
            return view('Backend.Master.lokasi.lokasiAll',compact('lokasi'));
        }

        public function lokasiAdd(){
            $lokasi = lokasi::all();
            return view('Backend.Master.lokasi.lokasiAdd',compact('lokasi'));
        }

        public function lokasiStore(Request $request ){

            $lokasi = lokasi::insert([
                'nama' => $request->nama,
                // 'created_by' => Auth::user()->id,
                'created_at' => Carbon::now()
            ]);
            $notification = array (
                'message' => 'lokasi Insert Successfully',
                'alert-type' => 'success',
            );
            return redirect()->route('lokasi.all')->with($notification);
        }

        public function lokasiDelete($id){
            lokasi::findOrFail($id)->delete();

             $notification = array(
                  'message' => 'lokasi Deleted Successfully',
                  'alert-type' => 'success'
              );
              return redirect()->back()->with($notification);
        }

        public function lokasiEdit($id){
            $lokasi = lokasi::findOrFail($id);
            return view('Backend.Master.lokasi.lokasiEdit',compact('lokasi'));
        }

        public function lokasiUpdate(Request $request){
            $id = $request->id;

            Lokasi::findOrFail($id)->update([
                'nama' => $request->nama,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Inventaris Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('lokasi.all')->with($notification);
        }
}