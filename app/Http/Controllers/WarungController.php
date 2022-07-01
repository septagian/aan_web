<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Daftar;

class WarungController extends Controller
{
    public function index()
    {
        $daftar=Daftar::get();
        return view('index', compact('daftar'));
    }
}
