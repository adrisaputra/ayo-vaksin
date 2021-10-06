<?php

namespace App\Http\Controllers;

use App\Models\Faskes;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;

class FaskesController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
    	$faskes = DB::table('faskes_tbl')->orderBy('id','DESC')->paginate(30)->onEachSide(1);
		return view('admin.faskes.index',compact('faskes'));
 
    }
	
	## Tampilkan Data Search
	public function search(Request $request)
    {
        $faskes = $request->get('search');
        $faskes = Faskes::
				where(function ($query) use ($faskes) {
					$query->where('nama_faskes', 'LIKE', '%'.$faskes.'%');
				})
                ->orderBy('id','DESC')->paginate(30)->onEachSide(1);
		return view('admin.faskes.index',compact('faskes'));
    }
	
	## Tampilkan Form Create
	public function create()
    {
        $view=view('admin.faskes.create');
        $view=$view->render();
        return $view;
    }
	
	## Simpan Data
	public function store(Request $request)
    {
		
    		$this->validate($request, [
		    'nama_faskes' => 'required'
        	]);

		$input['nama_faskes'] = $request->nama_faskes;
		$input['status'] = 1;
		
        	Faskes::create($input);
		
		return redirect('/faskes')->with('status','Data Tersimpan');

    }
	
	## Tampilkan Form Edit
	public function edit(Faskes $faskes)
	{
		$view=view('admin.faskes.edit', compact('faskes'));
        	$view=$view->render();
        	return $view;
	}
	
	## Edit Data
	public function update(Request $request, Faskes $faskes)
	{
		$this->validate($request, [
			'nama_faskes' => 'required'
		]);

		$faskes->fill($request->all());
		
    		$faskes->save();
		
		return redirect('/faskes')->with('status', 'Data Berhasil Diubah');
	}
	
	## Hapus Data
	public function delete(Faskes $faskes)
    {
		$id = $faskes->id;
		$faskes->delete();
		
        return redirect('/faskes')->with('status', 'Data Berhasil Dihapus');
    }
}
