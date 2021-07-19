<?php

namespace App\Http\Controllers;

use App\Models\Profil;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
        $profil = DB::table('profil_tbl')->orderBy('id','DESC')->paginate(10);
		return view('admin.profil.index',compact('profil'));
    }

    ## Tampilkan Form Edit
    public function edit(Profil $profil)
    {
        $view=view('admin.profil.edit', compact('profil'));
        $view=$view->render();
        return $view;
    }

    ## Edit Data
    public function update(Request $request, Profil $profil)
    {
         $this->validate($request, [
            'nama_dinas' => 'required',
            'alamat' => 'required',
            'telp' => 'required|numeric',
            'email' => 'required'
        ]);

		$profil->fill($request->all());
        
    	$profil->save();
		
		return redirect('/profil')->with('status', 'Data Berhasil Diubah');
    }
}
