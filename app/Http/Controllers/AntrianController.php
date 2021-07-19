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
        $antrian = Antrian::where('tanggal',date('Y-m-d'))->orderBy('id','ASC')->paginate(30);
		return view('admin.antrian.index',compact('antrian'));
    }

	## Tampilkan Data Search
	public function search(Request $request)
    {
        $antrian = $request->get('search');
        $antrian = Antrian::
                    where('tanggal',date('Y-m-d'))
                    ->where(function ($query) use ($antrian) {
                        $query->where('no_urut', 'LIKE', '%'.$antrian.'%')
                            ->orWhere('nik', 'LIKE', '%'.$antrian.'%')
                            ->orWhere('no_hp', 'LIKE', '%'.$antrian.'%')
                            ->orWhere('no_hp', 'LIKE', '%'.$antrian.'%')
                            ->orWhere('nama', 'LIKE', '%'.$antrian.'%');
                    })->orderBy('id','DESC')->paginate(10);
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
		$antrian->status = 1;
			
    	$antrian->save();
		
		return redirect('/antrian')->with('status', 'Data Berhasil Diubah');
    }

    ## Hapus Data
    public function delete(Antrian $antrian)
    {
        
		$pathToYourFile = 'upload/antrian_antrian/'.$antrian->antrian;
		if(file_exists($pathToYourFile)) 
		{
			unlink($pathToYourFile); 
		}
			
		$antrian->delete();
		
        return redirect('/antrian')->with('status', 'Data Berhasil Dihapus');
    }
}
