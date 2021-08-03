<?php

namespace App\Http\Controllers;

use App\Models\Antrian;   //nama model
use App\Models\Faskes;   //nama model
use Illuminate\Http\Request;

class InfoKuotaController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
        $info_kuota = Antrian::leftJoin('faskes_tbl', 'antrian_tbl.faskes', '=', 'faskes_tbl.id')
                    ->where('tanggal',date('Y-m-d'))
                            ->where('status_hapus', 0)
                            ->groupBy('faskes')
                            ->orderBy('faskes_tbl.id','ASC')->paginate(50)->onEachSide(1);
		return view('admin.info_kuota.index',compact('info_kuota'));
    }
	
}
