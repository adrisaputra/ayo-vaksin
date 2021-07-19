<?php

namespace App\Http\Controllers;

use App\Models\User;   //nama model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; //untuk membuat query di controller
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
      ## Cek Login
      public function __construct()
      {
          $this->middleware('auth');
      }
      
      ## Tampikan Data
      public function index()
      {
          $user = DB::table('users')->orderBy('id','DESC')->paginate(20);
          
          $group = Auth::user()->group;
          if($group !=1 ){
              return redirect('/home');
          } else {
              return view('admin.user.index',compact('user'));
          }
      }
      
      ## Tampilkan Data Search
      public function search(Request $request)
      {
          $user = $request->get('search');
          
          $user = User::where('name', 'LIKE', '%'.$user.'%')->orderBy('id','DESC')->paginate(20);
      
          $group = Auth::user()->group;
          if($group !=1 ){
              return redirect('/home');
          } else {
              return view('admin.user.index',compact('user'));
          }
          
      }
      
      ## Tampilkan Form Create
      public function create()
      {
          $view=view('admin.user.create');
          $view=$view->render();
          return $view;
      }
      
      ## Simpan Data
      public function store(Request $request)
      {
            $this->validate($request, [
                'name' => 'required|string|max:255|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed'
                
            ]);
            
            $input['name'] = $request->name;
            $input['email'] = $request->email;
            $input['password'] = Hash::make($request->password);
            $input['group'] = $request->group;
            $input['status'] = 1;
          
            User::create($input);
          
            return redirect('/user')->with('status','Data Tersimpan');
  
      }
      
      ## Tampilkan Form Edit
      public function edit(User $user)
      {
          $view=view('admin.user.edit', compact('user'));
          $view=$view->render();
          
          $id = Auth::user()->id;
          if($id !=1 ){
              return redirect('/home');
          } else {
              return $view;
          }
         
      }
      
      ## Edit Data
      public function update(Request $request, User $user)
      {
          if($request->password){
              $this->validate($request, [
                  'name' => 'required|string|max:255',
                  'password' => 'required|string|min:8|confirmed',
                  'status' => 'required'
              ]);
          } else {
              $this->validate($request, [
                  'name' => 'required|string|max:255',
                  'status' => 'required'
              ]);
          }
  
        //   $user->fill($request->all());
          
          $user->name = $request->name;
          $user->email = $request->email;
          if($request->password){
            $user->password = Hash::make($request->password);
          }
          $user->group = $request->group;
          $user->status = $request->status;
          $user->save();
          
          $group = Auth::user()->group;
          if($group !=1 ){
              return redirect('/home');
          } else {
              return redirect('/user')->with('status', 'Data Berhasil Diubah');
          }
          
      }
  
      ## Hapus Data
      public function delete(User $user)
      {
          $id = $user->id;
          $user->delete();
          
          $group = Auth::user()->group;
          if($group !=1 ){
              return redirect('/home');
          } else {
              return redirect('/user')->with('status', 'Data Berhasil Dihapus');
          }
          
      }
}
