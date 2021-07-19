<?php

namespace App\Http\Controllers;

use App\Models\Setting;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
     ## Cek Login
     public function __construct()
     {
         $this->middleware('auth');
     }
     
     ## Tampikan Data
     public function index()
     {
         $setting = Setting::orderBy('id','DESC')->paginate(10);
         return view('admin.setting.index',compact('setting'));
     }
 
     ## Tampilkan Form Edit
     public function edit(Setting $setting)
     {
         $view=view('admin.setting.edit', compact('setting'));
         $view=$view->render();
         return $view;
     }
 
     ## Edit Data
     public function update(Request $request, Setting $setting)
     {
         $this->validate($request, [
             'jumlah' => 'required|numeric'
         ]);
 
         $setting->fill($request->all());
         
         $setting->save();
         
         return redirect('/setting')->with('status', 'Data Berhasil Diubah');
     }
 
}
