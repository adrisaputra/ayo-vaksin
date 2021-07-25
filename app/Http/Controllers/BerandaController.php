<?php

namespace App\Http\Controllers;

use App\Models\Antrian;   //nama model
use App\Models\Setting;   //nama model
use App\Models\Slider;   //nama model
use App\Models\Faskes;   //nama model
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
        $setting = DB::table('setting_tbl')->get()->toArray();
        // $tanggal = date('Y-m-d');
        // $jam = date('H:i:s');
        // if(($tanggal==date('Y-m-d')) && ($jam>='13:00:00' && $jam<='24:00:00')){
        //     $jumlah_antrian = Antrian::where('tanggal',date('Y-m-d',strtotime($tanggal . "+1 days")))->count();
        // } else if(($tanggal==date('Y-m-d')) && ($jam>='00:00:00' && $jam<='12:00:00')) {
        //     $jumlah_antrian = Antrian::where('tanggal',date('Y-m-d'))->count();
        // } else {
        //     $jumlah_antrian = DB::table('setting_tbl')->get()->toArray();
        // }
        $slider = Slider::get();
        $faskes = Faskes::get();
        // return view('web.beranda', compact('slider','profil','title','setting','jumlah_antrian'));
        return view('web.beranda', compact('slider','profil','title','setting','faskes'));
    }

    // public function create()
    // {
        
    //     $setting = DB::table('setting_tbl')->get()->toArray();
    //     $tanggal = date('Y-m-d');
    //     $jam = date('H:i:s');
    //     if(($tanggal==date('Y-m-d')) && ($jam>='13:00:00' && $jam<='24:00:00')){
    //         $jumlah_antrian = Antrian::where('tanggal',date('Y-m-d',strtotime($tanggal . "+1 days")))->count();
    //         $tgl = date('d-m-Y',strtotime($tanggal . "+1 days"));
                
    //         if($setting[0]->jumlah > $jumlah_antrian){
    //             $title = "Registrasi Vaksin";
    //             $profil = DB::table('profil_tbl')->where('id',1)->get()->toArray();
    //             $faskes = Faskes::get();
    //             $view=view('web.antrian.create', compact('title','profil','faskes'));
    //             $view=$view->render();
    //             return $view;
    //         } else {
    //             return redirect('/')->with('status2','Pendaftaran Tanggal '.$tgl.' Sudah Penuh');
    //         }

    //     } else if(($tanggal==date('Y-m-d')) && ($jam>='00:00:00' && $jam<='12:00:00')) {
    //         $jumlah_antrian = Antrian::where('tanggal',date('Y-m-d'))->count();
    //         $tgl = date('d-m-Y');
                
    //         if($setting[0]->jumlah > $jumlah_antrian){
    //             $title = "Registrasi Vaksin";
    //             $profil = DB::table('profil_tbl')->where('id',1)->get()->toArray();
    //             $faskes = Faskes::get();
    //             $view=view('web.antrian.create', compact('title','profil','faskes'));
    //             $view=$view->render();
    //             return $view;
    //         } else {
    //             return redirect('/')->with('status2','Pendaftaran Tanggal '.$tgl.' Sudah Penuh');
    //         }

    //     } else {
    //         $jumlah_antrian = DB::table('setting_tbl')->get()->toArray();
    //         $tgl = date('d-m-Y');
                
    //         if($setting[0]->jumlah > $jumlah_antrian){
    //             $title = "Registrasi Vaksin";
    //             $profil = DB::table('profil_tbl')->where('id',1)->get()->toArray();
    //             $faskes = Faskes::get();
    //             $view=view('web.antrian.create', compact('title','profil','faskes'));
    //             $view=$view->render();
    //             return $view;
    //         } else {
    //             return redirect('/')->with('status2','Pendaftaran Tanggal '.$tgl.' Sudah Ditutup. Pendaftaran Hari Selanjutnya Dibuka Pukul 13.00 WITA');
    //         }

    //     }

    // }

    public function create()
    {
        $setting = DB::table('setting_tbl')->get()->toArray();
        $title = "Registrasi Vaksin";
        $profil = DB::table('profil_tbl')->where('id',1)->get()->toArray();
        $faskes = Faskes::get();
        $view=view('web.antrian.create', compact('title','profil','faskes'));
        $view=$view->render();
        return $view;
    }

    public function tiket($id)
    {
            $title = "Cetak Tiket Vaksin";
            $profil = DB::table('profil_tbl')->where('id',1)->get()->toArray();
            $view=view('web.antrian.tiket', compact('title','profil'));
            $view=$view->render();
            return $view;
    }

    ## Simpan Data
    public function store(Request $request)
    {
        if($request->vaksin_ke==1){
            $this->validate($request, [
                'faskes' => 'required',
                'nik' => 'required|digits:16',
                'nama' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
                'domisili' => 'required',
                'pekerjaan' => 'required',
                'tempat_kerja' => 'required',
                'no_hp' => 'required',
                'vaksin_ke' => 'required',
                'tujuan' => 'required'
            ]);
        } else if($request->vaksin_ke==3){
            $this->validate($request, [
                'faskes' => 'required',
                'nik' => 'required|digits:16',
                'nama' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
                'domisili' => 'required',
                'pekerjaan' => 'required',
                'tempat_kerja' => 'required',
                'no_hp' => 'required',
                'vaksin_ke' => 'required'
            ]);
        } else {
            $this->validate($request, [
                'faskes' => 'required',
                'nik' => 'required|digits:16',
                'nama' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
                'domisili' => 'required',
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
        $setting_jumlah_antrian = DB::table('faskes_tbl')->where('id',$request->faskes)->get()->toArray();

        if(($tanggal==date('Y-m-d')) && ($jam>='13:00:00' && $jam<='24:00:00')){
            $jumlah_antrian = DB::table('antrian_tbl')
                            ->where('status_hapus',0)
                            ->where('faskes',$request->faskes)
                            ->where('tanggal',date('Y-m-d',strtotime($tanggal . "+1 days")))
                            ->count();
            $cek_data = DB::table('antrian_tbl')
                            ->where('status_hapus',0)
                            ->where('tanggal',date('Y-m-d',strtotime($tanggal . "+1 days")))
                            ->where('nik',$request->nik)
                            ->count();
            $cek_data_faskes = DB::table('antrian_tbl')
                            ->leftJoin('faskes_tbl', 'antrian_tbl.faskes', '=', 'faskes_tbl.id')
                            ->where('status_hapus',0)
                            ->where('tanggal',date('Y-m-d',strtotime($tanggal . "+1 days")))
                            ->where('nik',$request->nik)
                            ->get()->toArray();
        } else if(($tanggal==date('Y-m-d')) && ($jam>='00:00:00' && $jam<='11:00:00')) {
            $jumlah_antrian = DB::table('antrian_tbl')
                            ->where('status_hapus',0)
                            ->where('faskes',$request->faskes)
                            ->where('tanggal',date('Y-m-d'))
                            ->count();
            $cek_data = DB::table('antrian_tbl')
                            ->where('status_hapus',0)
                            ->where('tanggal',date('Y-m-d'))
                            ->where('nik',$request->nik)
                            ->count();
            $cek_data_faskes = DB::table('antrian_tbl')
                            ->leftJoin('faskes_tbl', 'antrian_tbl.faskes', '=', 'faskes_tbl.id')
                            ->where('status_hapus',0)
                            ->where('tanggal',date('Y-m-d'))
                            ->where('nik',$request->nik)
                            ->get()->toArray();
        } else {
            $jumlah_antrian = DB::table('faskes_tbl')
                                ->where('id',$request->faskes)
                                ->get()->toArray();
            $cek_data = DB::table('antrian_tbl')
                        ->where('status_hapus',0)
                        ->where('tanggal',date('Y-m-d'))
                        ->where('nik',$request->nik)
                        ->count();
            $cek_data_faskes = DB::table('antrian_tbl')
                            ->leftJoin('faskes_tbl', 'antrian_tbl.faskes', '=', 'faskes_tbl.id')
                            ->where('status_hapus',0)
                            ->where('tanggal',date('Y-m-d'))
                            ->where('nik',$request->nik)
                            ->get()->toArray();
        }

            if($cek_data>0){
                return redirect('/antrian_w/create')->with('status2','Sudah Registrasi Hari Ini Di '.$cek_data_faskes[0]->nama_faskes);
            } else if(($tanggal==date('Y-m-d')) && ($jam>='13:00:00' && $jam<='24:00:00')){
    
                if($setting_jumlah_antrian[0]->jumlah_antrian > $jumlah_antrian){
                    $antrian = new Antrian();
                    $antrian->no_urut = $jumlah_antrian + 1;
                    $antrian->faskes = $request->faskes;
                    $antrian->nik = $request->nik;
                    $antrian->nama = $request->nama;
                    $antrian->tempat_lahir = $request->tempat_lahir;
                    $antrian->tanggal_lahir = $request->tanggal_lahir;
                    $antrian->alamat = $request->alamat;
                    $antrian->domisili = $request->domisili;
                    $antrian->pekerjaan = $request->pekerjaan;
                    $antrian->tempat_kerja = $request->tempat_kerja;
                    $antrian->no_hp = $request->no_hp;
                    $antrian->vaksin_ke = $request->vaksin_ke;
                    if($request->vaksin_ke==1){    
                        $antrian->tujuan = $request->tujuan;
                    }else if($request->vaksin_ke==2){    
                        $antrian->no_tiket = $request->no_tiket;
                        $antrian->tanggal_vaksin_pertama = $request->tanggal_vaksin_pertama;
                        $antrian->faskes_vaksin_pertama = $request->faskes_vaksin_pertama;
                    }
                    $antrian->status = 0;
                    $antrian->tanggal = date('Y-m-d',strtotime($tanggal . "+1 days"));
        
                    $antrian->save();
                    
                    return redirect('/antrian_w/tiket/'.$antrian->id)->with('status','Registrasi Berhasil');
                } else {
                    return redirect('/antrian_w/create')->with('status2','Antrian Pada Faskes Yang Di Pilih Sudah Penuh');
                }
               
    
            } else if(($tanggal==date('Y-m-d')) && ($jam>='00:00:00' && $jam<='11:00:00')) {
                
                if($setting_jumlah_antrian[0]->jumlah_antrian > $jumlah_antrian){
                    $antrian = new Antrian();
                    $antrian->no_urut = $jumlah_antrian + 1;
                    $antrian->faskes = $request->faskes;
                    $antrian->nik = $request->nik;
                    $antrian->nama = $request->nama;
                    $antrian->tempat_lahir = $request->tempat_lahir;
                    $antrian->tanggal_lahir = $request->tanggal_lahir;
                    $antrian->alamat = $request->alamat;
                    $antrian->domisili = $request->domisili;
                    $antrian->pekerjaan = $request->pekerjaan;
                    $antrian->tempat_kerja = $request->tempat_kerja;
                    $antrian->no_hp = $request->no_hp;
                    $antrian->vaksin_ke = $request->vaksin_ke;
                    if($request->vaksin_ke==1){    
                        $antrian->tujuan = $request->tujuan;
                    }else if($request->vaksin_ke==2){    
                        $antrian->no_tiket = $request->no_tiket;
                        $antrian->tanggal_vaksin_pertama = $request->tanggal_vaksin_pertama;
                        $antrian->faskes_vaksin_pertama = $request->faskes_vaksin_pertama;
                    }
                    $antrian->status = 0;
                    $antrian->tanggal = $tanggal;
        
                    $antrian->save();
                    
                    return redirect('/antrian_w/tiket/'.$antrian->id)->with('status','Registrasi Berhasil');
                } else {
                    
                    return redirect('/antrian_w/create')->with('status2','Antrian Pada Faskes Yang Di Pilih Sudah Penuh');
                }
                
            } else {
                return redirect('/')->with('status2','Pendaftaran Tanggal '.$tanggal.' Sudah Ditutup. Pendaftaran Hari Selanjutnya Dibuka Pukul 13.00 WITA');  
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
    	$antrian = Antrian::leftJoin('faskes_tbl', 'faskes_tbl.id', '=', 'antrian_tbl.faskes')->where('antrian_tbl.id',$id)->get();
    	$antrian->toArray();

    	$pdf = PDF::loadview('web.antrian.cetak',[
                                'antrian'=>$antrian
                            ]);
    	return $pdf->download('tiket vaksin dinkes.pdf');
    }

}
