<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function formInventaris(){
        return view('admin.Inventory.FormInventory');
    }
}