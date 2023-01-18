<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class user extends Controller
{
    public function usersAll(){
        return view('Backend.user.user.all');
    }

}
