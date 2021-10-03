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
        if(Auth::user()->group==1){
            $jumlah_antrian = Antrian::where('tanggal',date('Y-m-d'))->where('status_hapus', 0)->count();
            $sudah_divaksin = Antrian::where('tanggal',date('Y-m-d'))->where('status', 1)->where('status_hapus', 0)->count();
            $belum_divaksin = Antrian::where('tanggal',date('Y-m-d'))->where('status', 0)->where('status_hapus', 0)->count();
        } else {
            $jumlah_antrian = Antrian::where('tanggal',date('Y-m-d'))->where('status_hapus', 0)->where('faskes', Auth::user()->faskes)->count();
            $sudah_divaksin = Antrian::where('tanggal',date('Y-m-d'))->where('status', 1)->where('status_hapus', 0)->where('faskes', Auth::user()->faskes)->count();
            $belum_divaksin = Antrian::where('tanggal',date('Y-m-d'))->where('status', 0)->where('status_hapus', 0)->where('faskes', Auth::user()->faskes)->count();
        }
           
        return view('admin.beranda', compact('jumlah_antrian','sudah_divaksin','belum_divaksin'));
    }
}
