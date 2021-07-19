<?php

namespace App\Http\Controllers;

use App\Models\Antrian;   //nama model
use App\Models\Setting;   //nama model
use App\Models\Slider;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use PDF;

class BerandaController extends Controller
{
    public function index()
    {
        $title = 'ANTRIAN VAKSIN HARI INI';
        $profil = DB::table('profil_tbl')->where('id',1)->get()->toArray();
        $antrian = Antrian::where('tanggal',date('Y-m-d'))->orderBy('id','ASC')->paginate(30);
        $setting = DB::table('setting_tbl')->get()->toArray();
        $jumlah_antrian = Antrian::where('tanggal',date('Y-m-d'))->count();
        $slider = Slider::get();
        return view('web.beranda', compact('antrian','slider','profil','title','setting','jumlah_antrian'));
    }

    public function hari_ini()
    {
        $title = 'ANTRIAN VAKSIN HARI INI';
        $profil = DB::table('profil_tbl')->where('id',1)->get()->toArray();
        $antrian = Antrian::where('tanggal',date('Y-m-d'))->orderBy('id','ASC')->paginate(30);
        $setting = DB::table('setting_tbl')->get()->toArray();
        $jumlah_antrian = Antrian::where('tanggal',date('Y-m-d'))->count();
        $slider = Slider::get();
        return view('web.beranda', compact('antrian','slider','profil','title','setting','jumlah_antrian'));
    }

    public function besok()
    {
        $title = 'ANTRIAN VAKSIN BESOK';
        $profil = DB::table('profil_tbl')->where('id',1)->get()->toArray();
        $tanggal = date('Y-m-d');
        $antrian = Antrian::where('tanggal',date('Y-m-d',strtotime($tanggal . "+1 days")))->orderBy('id','ASC')->paginate(30);
        $setting = DB::table('setting_tbl')->get()->toArray();
        $jumlah_antrian = Antrian::where('tanggal',date('Y-m-d',strtotime($tanggal . "+1 days")))->count();
        $slider = Slider::get();
        return view('web.beranda', compact('antrian','slider','profil','title','setting','jumlah_antrian'));
    }

    public function search(Request $request)
    {
        $title = 'ANTRIAN VAKSIN HARI INI';
        $profil = DB::table('profil_tbl')->where('id',1)->get()->toArray();
        $antrian = $request->get('search');
        $antrian = Antrian::
                where('tanggal',date('Y-m-d'))
                ->where(function ($query) use ($antrian) {
                    $query->where('no_urut', 'LIKE', '%'.$antrian.'%')
                        ->orWhere('nik', 'LIKE', '%'.$antrian.'%')
                        ->orWhere('no_hp', 'LIKE', '%'.$antrian.'%')
                        ->orWhere('no_hp', 'LIKE', '%'.$antrian.'%')
                        ->orWhere('nama', 'LIKE', '%'.$antrian.'%');
                })->orderBy('id','DESC')->paginate(30);
        $setting = DB::table('setting_tbl')->get()->toArray();
        $jumlah_antrian = Antrian::whereDate('tanggal',date('Y-m-d'))->count();
        $slider = Slider::get();
        return view('web.beranda',compact('antrian','slider','profil','title','setting','jumlah_antrian'));
    }

    public function search_hari_ini(Request $request)
    {
        $title = 'ANTRIAN VAKSIN HARI INI';
        $profil = DB::table('profil_tbl')->where('id',1)->get()->toArray();
        $antrian = $request->get('search');
        $antrian = Antrian::
                where('tanggal',date('Y-m-d'))
                ->where(function ($query) use ($antrian) {
                    $query->where('no_urut', 'LIKE', '%'.$antrian.'%')
                        ->orWhere('nik', 'LIKE', '%'.$antrian.'%')
                        ->orWhere('no_hp', 'LIKE', '%'.$antrian.'%')
                        ->orWhere('no_hp', 'LIKE', '%'.$antrian.'%')
                        ->orWhere('nama', 'LIKE', '%'.$antrian.'%');
                })->orderBy('id','DESC')->paginate(30);
        $setting = DB::table('setting_tbl')->get()->toArray();
        $jumlah_antrian = Antrian::whereDate('tanggal',date('Y-m-d'))->count();
        $slider = Slider::get();
        return view('web.beranda',compact('antrian','slider','profil','title','setting','jumlah_antrian'));
    }

    public function search_besok(Request $request)
    {
        $title = 'ANTRIAN VAKSIN HARI INI';
        $profil = DB::table('profil_tbl')->where('id',1)->get()->toArray();
        $tanggal = date('Y-m-d');
        $antrian = $request->get('search');
        $antrian = Antrian::
                where('tanggal',date('Y-m-d',strtotime($tanggal . "+1 days")))
                ->where(function ($query) use ($antrian) {
                    $query->where('no_urut', 'LIKE', '%'.$antrian.'%')
                        ->orWhere('nik', 'LIKE', '%'.$antrian.'%')
                        ->orWhere('no_hp', 'LIKE', '%'.$antrian.'%')
                        ->orWhere('no_hp', 'LIKE', '%'.$antrian.'%')
                        ->orWhere('nama', 'LIKE', '%'.$antrian.'%');
                })->orderBy('id','DESC')->paginate(30);
        $setting = DB::table('setting_tbl')->get()->toArray();
        $jumlah_antrian = Antrian::whereDate('tanggal',date('Y-m-d',strtotime($tanggal . "+1 days")))->count();
        $slider = Slider::get();
        return view('web.beranda',compact('antrian','slider','profil','title','setting','jumlah_antrian'));
    }

    public function create()
    {
        
        $setting = DB::table('setting_tbl')->get()->toArray();
        $jumlah_antrian = Antrian::whereDate('tanggal',date('Y-m-d'))->count();
        if($setting[0]->jumlah > $jumlah_antrian){
            $title = "Registrasi Vaksin";
            $profil = DB::table('profil_tbl')->where('id',1)->get()->toArray();
            $view=view('web.antrian.create', compact('title','profil'));
            $view=$view->render();
            return $view;
        } else {
            return redirect('/')->with('status2','Sudah Melebihi Kuota Registrasi');
        }
    }

    ## Simpan Data
    public function store(Request $request)
    {
        if($request->vaksin_ke==1){
            $this->validate($request, [
                'nik' => 'required|digits:16',
                'nama' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
                'pekerjaan' => 'required',
                'tempat_kerja' => 'required',
                'no_hp' => 'required',
                'vaksin_ke' => 'required'
            ]);
        } else {
            $this->validate($request, [
                'nik' => 'required|digits:16',
                'nama' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
                'pekerjaan' => 'required',
                'tempat_kerja' => 'required',
                'no_hp' => 'required',
                'vaksin_ke' => 'required',
                'tanggal_vaksin_pertama' => 'required',
                'faskes' => 'required'
            ]);
        }

        $tanggal = date('Y-m-d');
        $jam = date('H:i:s');

        if(($tanggal==date('Y-m-d')) && ($jam>='13:00:00' && $jam<='24:00:00')){
            $jumlah_antrian = DB::table('antrian_tbl')->where('tanggal',date('Y-m-d',strtotime($tanggal . "+1 days")))->count();
            $cek_data = DB::table('antrian_tbl')->where('tanggal',date('Y-m-d',strtotime($tanggal . "+1 days")))->where('nik',$request->nik)->count();
        } else if(($tanggal==date('Y-m-d')) && ($jam>='00:00:00' && $jam<='12:00:00')) {
            $jumlah_antrian = DB::table('antrian_tbl')->where('tanggal',date('Y-m-d'))->count();
            $cek_data = DB::table('antrian_tbl')->where('tanggal',date('Y-m-d'))->where('nik',$request->nik)->count();
        }

        if($cek_data>0){
            return redirect('/')->with('status2','Sudah Registrasi Hari Ini');
        } else if(($tanggal==date('Y-m-d')) && ($jam>='13:00:00' && $jam<='24:00:00')){
            $input['no_urut'] =  $jumlah_antrian + 1;
            $input['nik'] = $request->nik;
            $input['nama'] = $request->nama;
            $input['tempat_lahir'] = $request->tempat_lahir;
            $input['tanggal_lahir'] = $request->tanggal_lahir;
            $input['alamat'] = $request->alamat;
            $input['pekerjaan'] = $request->pekerjaan;
            $input['tempat_kerja'] = $request->tempat_kerja;
            $input['no_hp'] = $request->no_hp;
            $input['vaksin_ke'] = $request->vaksin_ke;
            if($request->vaksin_ke==2){    
             $input['no_tiket'] = $request->no_tiket;
             $input['tanggal_vaksin_pertama'] = $request->tanggal_vaksin_pertama;
             $input['faskes'] = $request->faskes;
            }
            $input['status'] = 0;
            $input['tanggal'] = date('Y-m-d',strtotime($tanggal . "+1 days"));

            Antrian::create($input);
            
            return redirect('/')->with('status','Data Tersimpan');
        } else if(($tanggal==date('Y-m-d')) && ($jam>='00:00:00' && $jam<='12:00:00')) {
            $input['no_urut'] =  $jumlah_antrian + 1;
            $input['nik'] = $request->nik;
            $input['nama'] = $request->nama;
            $input['tempat_lahir'] = $request->tempat_lahir;
            $input['tanggal_lahir'] = $request->tanggal_lahir;
            $input['alamat'] = $request->alamat;
            $input['pekerjaan'] = $request->pekerjaan;
            $input['tempat_kerja'] = $request->tempat_kerja;
            $input['no_hp'] = $request->no_hp;
            $input['vaksin_ke'] = $request->vaksin_ke;
            if($request->vaksin_ke==2){    
             $input['no_tiket'] = $request->no_tiket;
             $input['tanggal_vaksin_pertama'] = $request->tanggal_vaksin_pertama;
             $input['faskes'] = $request->faskes;
            }
            $input['status'] = 0;
            $input['tanggal'] = $tanggal;

            Antrian::create($input);
            
            return redirect('/besok')->with('status','Data Tersimpan');
        } else {
            return redirect('/')->with('status2','Waktu Registrasi Telah Berakhir! Silahkan Registrasi Besok Hari');
        }
           
        
    }

    public function detail(Antrian $antrian)
    {
        $title = "DETAIL DATA REGISTRASI";
        $profil = DB::table('profil_tbl')->where('id',1)->get()->toArray();
        $view=view('web.antrian.detail', compact('title','antrian','profil'));
        $view=$view->render();
        return $view;
    }
    public function cetak($id)
    {
    	$antrian = Antrian::where('id',$id)->get();
    	$antrian->toArray();

    	$pdf = PDF::loadview('web.antrian.cetak',[
                                'antrian'=>$antrian
                            ]);
    	return $pdf->download($antrian[0]->nik.'.pdf');
    }

}
