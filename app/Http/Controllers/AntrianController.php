<?php

namespace App\Http\Controllers;

use App\Models\Antrian;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;

class AntrianController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
        $antrian = Antrian::where('tanggal',date('Y-m-d'))
                            ->where('faskes', Auth::user()->faskes)
                            ->where('status_hapus', 0)
                            ->orderBy('id','ASC')->paginate(100)->onEachSide(1);
		return view('admin.antrian.index',compact('antrian'));
    }

	## Tampilkan Data Search
	public function search(Request $request)
    {
        $antrian = $request->get('search');
        $tanggal = $request->get('tanggal');
        $antrian = Antrian::
                    where(function ($query) use ($tanggal) {
                        $query->where('tanggal', 'LIKE', '%'.$tanggal.'%');
                    })
                    // where('tanggal',$tanggal)
                    ->where('faskes', Auth::user()->faskes)
                    ->where('status_hapus', 0)
                    ->where(function ($query) use ($antrian) {
                        $query->where('no_urut', 'LIKE', '%'.$antrian.'%')
                            ->orWhere('nik', 'LIKE', '%'.$antrian.'%')
                            ->orWhere('no_hp', 'LIKE', '%'.$antrian.'%')
                            ->orWhere('no_hp', 'LIKE', '%'.$antrian.'%')
                            ->orWhere('nama', 'LIKE', '%'.$antrian.'%');
                    })->orderBy('id','ASC')->paginate(100)->onEachSide(1);
		return view('admin.antrian.index',compact('antrian'));
    }
	
    ## Tampilkan Form Edit
    public function edit(Antrian $antrian)
    {
        $view=view('admin.antrian.edit', compact('antrian'));
        $view=$view->render();
        return $view;
    }

    ## Edit Data
    public function update(Request $request, Antrian $antrian)
    {
       
		$antrian->fill($request->all());

        if($request->status=="hadir"){
            $antrian->status = 1;
        } else if($request->status=="tidak_hadir"){
            $antrian->status = 2;
        } else {
            $antrian->status = 3;
        }
			
    	$antrian->save();
		
		return redirect('/antrian')->with('status', 'Data Berhasil Diubah');
    }

    ## Hapus Data
    public function delete(Antrian $antrian)
    {
        $antrian->status_hapus = 1;
			
    	$antrian->save();
		
        return redirect('/antrian')->with('status', 'Data Berhasil Dihapus');
    }
}
