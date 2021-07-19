<?php

namespace App\Http\Controllers;

use App\Models\User;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{
    ## Simpan Data
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|alpha_dash|unique:users',
            'email' => 'required|unique:users',
            'nik' => 'required|numeric|digits:16|unique:users',
            'alamat' => 'required',
            'no_hp' => 'required|numeric',
            'foto_ktp' => 'required|mimes:jpg,jpeg,png|max:300',
            'password' => 'required|string|min:8|confirmed'
        ]);

		$input['name'] = $request->name;
        $input['email'] = $request->email;
        $input['nik'] = $request->nik;
        $input['alamat'] = $request->alamat;
        $input['no_hp'] = $request->no_hp;
        $input['password'] = Hash::make($request->password);
        $input['group'] = 7;
        $input['status'] = 1;
        
        if($request->file('foto_ktp')){
            $input['foto_ktp'] = time().'.'.$request->foto_ktp->getClientOriginalExtension();
            $request->foto_ktp->move(public_path('upload/foto_ktp'), $input['foto_ktp']);
        }	
        
        User::create($input);

		return redirect('/login_w')->with('status','Registrasi Berhasil, silahkan login !');

    }

    ## Edit Data
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'alamat' => 'required',
            'no_hp' => 'required|numeric',
            'foto_ktp' => 'mimes:jpg,jpeg,png|max:300',
            'password' => 'required|string|min:8|confirmed'
        ]);

		$user->fill($request->all());
        if($request->password){
            $user->password = Hash::make($request->password);
        }
		
		if($request->file('foto_ktp') == ""){}
    	else
    	{	
            $filename = time().'.'.$request->foto_ktp->getClientOriginalExtension();
            $request->foto_ktp->move(public_path('upload/foto_ktp'), $filename);
            $user->foto_ktp = $filename;
		}
		
    	$user->save();
		
		return redirect('/login_w')->with('status', 'Data Berhasil Diubah');
    }

}
