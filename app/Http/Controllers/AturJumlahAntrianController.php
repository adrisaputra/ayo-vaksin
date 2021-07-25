<?php

namespace App\Http\Controllers;

use App\Models\Faskes;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;

class AturJumlahAntrianController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
        if(Auth::user()->group==1){ 
    	    $faskes = DB::table('faskes_tbl')->orderBy('id','DESC')->paginate(20);
        } else {
    	    $faskes = DB::table('faskes_tbl')->where('id',Auth::user()->faskes)->orderBy('id','DESC')->paginate(20);
        }
		return view('admin.atur_jumlah_antrian.index',compact('faskes'));
 
    }
	
	## Tampilkan Form Edit
	public function edit(Faskes $faskes)
	{
		$view=view('admin.atur_jumlah_antrian.edit', compact('faskes'));
        $view=$view->render();
        return $view;
	}
	
	## Edit Data
	public function update(Request $request, Faskes $faskes)
	{
		$this->validate($request, [
			'jumlah_antrian' => 'required'
		]);

		$faskes->fill($request->all());
		
    	$faskes->save();
		
		return redirect('/atur_jumlah_antrian')->with('status', 'Data Berhasil Diubah');
	}
	
}
