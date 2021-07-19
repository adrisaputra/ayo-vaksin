<?php

namespace App\Http\Controllers;

use App\Models\Antrian;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    public function index()
    {
            $jumlah_antrian = Antrian::where('tanggal',date('Y-m-d'))->count();
            $sudah_divaksin = Antrian::where('tanggal',date('Y-m-d'))->where('status', 1)->count();
            $belum_divaksin = Antrian::where('tanggal',date('Y-m-d'))->where('status', 0)->count();
        
        return view('admin.beranda', compact('jumlah_antrian','sudah_divaksin','belum_divaksin'));
    }
}
