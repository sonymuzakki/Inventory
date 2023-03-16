<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use App\Models\Divisi;
use Carbon\Carbon;
use App\Models\user;
use App\Models\history;
use App\Models\Inventory;
use App\Models\Jenis;
use App\Models\proses;

use function GuzzleHttp\Promise\all;

class HistoryController extends Controller
{
    public function HistoryAll(){
        // $allData = history::latest()->first()->get();
        // $inventory = Inventory::all();
        // $user   = user::all();
        $allData = history::with(['inventory','user'])->latest()->get();
        return view('Backend.Request.historyAll',compact('allData'));
    }

    public function RequestAdd(){
        $history = history::all();
        $inventory = inventory::all();
        $user = user::all();
        $divisi = Divisi::all();
        $jenis = Jenis::all();
        return view('Backend.Request.requestAdd',compact('inventory','history','user','divisi','jenis'));
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

            return redirect()->route('request.all')->with($notification);
    }

        public function RequestPending(){
        // $allData = history::orderBy('date','desc')->where('status','0')->get();
        $allData = history::latest()->where('status','0')->get();
        $inventory = Inventory::all();
        $user   = user::all();
        return view('Backend.Request.historyAll',compact('allData'));
    }

    public function historyProses($id){
        $history = history::find($id);
        $user   = user::all();
        $inventory = Inventory::all();

        return view('Backend.Request.historyProses',compact('history','inventory','user'));
    }

    public function historyUpdate(Request $request,$id){
        dd($request->all());
        $validated = $request->validate([
           'inventory_id' => 'required|exists:App\Models\Inventory,id',
        ]);
        $data = history::find($id);
        $data->inventory_id = $request->inventory_id;
        // $data->inventory_id = $request->jenis;
        $data->laporan = $request->laporan;
        $data->kendala = $request->kendala;
        $data->pengerjaan = $request->pengerjaan;
        $data->save();
        // $id = $request->id;
        // $data = history::findOrFail($id);

        // $data->inventory_id

        return redirect()->route('request.all');

    }

    public function historyApprove($id){

        $history = history::findOrFail($id);

        if($history->save()){

            history::findOrFail($id)->update([
                'status' => '1',
            ]);

             $notification = array(
        'message' => 'Status Approved Successfully',
        'alert-type' => 'success'
          );
    return redirect()->route('request.all')->with($notification);

        }

    }// End Method

    public function historyApproveDashboard($id){

        $history = history::findOrFail($id);

        if($history->save()){

            history::findOrFail($id)->update([
                'status' => '1',
            ]);

             $notification = array(
        'message' => 'Status Approved Successfully',
        'alert-type' => 'success'
          );
    return redirect()->route('dashboard')->with($notification);

        }

    }// End Method

}