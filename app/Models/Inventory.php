<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    // protected $guarded = [];
    protected $table = 'inventory';
    protected $guarded = [];

    public function divisi(){
        return $this->belongsTo(divisi::class,'divisi_id','id');
    }

    public function lokasi(){
        return $this->belongsTo(lokasi::class,'lokasi_id','id');
    }

    public function user(){
        return $this->belongsTo(user::class,'user_id','id');
    }

    public function jenis(){
        return $this->belongsTo(Jenis::class,'jenis_id','id');
    }

}