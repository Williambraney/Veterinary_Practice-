<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;

class Ownercontroller extends Controller 
{
    //
    public function index()
    {
        return view("welcome", [
        "owners" => Owner::all(),
        ]);
    }
}
