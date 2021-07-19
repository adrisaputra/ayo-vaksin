<?php

namespace App\Http\Controllers;

use App\Models\Slider;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    ## Cek Login
    public function __construct()
    {
        $this->middleware('auth');
    }
	
    ## Tampikan Data
    public function index()
    {
    	$slider = DB::table('slider_tbl')->orderBy('id','DESC')->paginate(10);
		return view('admin.slider.index',compact('slider'));
 
    }
	
	## Tampilkan Form Create
	public function create()
    {
        $view=view('admin.slider.create');
        $view=$view->render();
        return $view;
    }
	
	## Simpan Data
	public function store(Request $request)
    {
		
    	$this->validate($request, [
		  'judul' => 'required',
            'isi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:500',
            
        ]);

		$input['judul'] = $request->judul;
		$input['isi'] = $request->isi;
		$input['gambar'] = time().'.'.$request->gambar->getClientOriginalExtension();
        $request->gambar->move(public_path('upload/slider'), $input['gambar']);
		
        Slider::create($input);
		
		return redirect('/slider')->with('status','Data Tersimpan');

    }
	
	## Tampilkan Detail
	public function show($id)
    {
        //
    }
	
	## Tampilkan Form Edit
	public function edit(Slider $slider)
	{
		$view=view('admin.slider.edit', compact('slider'));
        $view=$view->render();
        return $view;
	}
	
	## Edit Data
	public function update(Request $request, Slider $slider)
	{
		$this->validate($request, [
			'judul' => 'required',
			'isi' => 'required',
			'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:500',
		]);

		$slider->fill($request->all());
		
        if($request->file('gambar') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->gambar->getClientOriginalExtension();
            $request->gambar->move(public_path('upload/slider'), $filename);
            $slider->gambar = $filename;
		}
		
    	$slider->save();
		
		return redirect('/slider')->with('status', 'Data Berhasil Diubah');
	}
	
	## Hapus Data
	public function delete(Slider $slider)
    {
		$id = $slider->id;
		$slider->delete();
		
		$pathToYourFile = 'upload/slider/'.$slider->gambar;
		if(file_exists($pathToYourFile)) 
		{
			unlink($pathToYourFile); 
		}
			
        return redirect('/slider')->with('status', 'Data Berhasil Dihapus');
    }
}
