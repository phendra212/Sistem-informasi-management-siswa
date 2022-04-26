<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    public function index (Request $request){
       //dd($request->all());
       if($request -> has ('cari')){
        $data_siswa = \App\Models\Siswa::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
    }else{
        $data_siswa = \App\Models\Siswa::all();
    }
        return view ('siswa.index', ['data_siswa' => $data_siswa]);
    }

    public function create (Request $request){
        
        

        //insert table user
        $user = new \App\Models\User;
        $user->role='siswa';
        $user->name=$request->nama_depan;
        $user->email=$request->email;
        $user->password= bcrypt('password');
        $user->remember_token = str_random(60);
        $user->save();

        //insert table siswa
        $request->request->add(['user_id' => $user->id]);
        $siswa = \App\Models\Siswa::create($request->all());

        return redirect('/siswa')->with('sukses','Data berhasil diinput');
    }

    public function edit ($id){
        $siswa = \App\Models\Siswa::find($id);
        return view ('siswa/edit', ['siswa' => $siswa]); 
    }
    
    public function update (Request $request, $id){
        
        $siswa = \App\Models\Siswa::find($id);
        $siswa -> update ($request -> all());
        if($request->hasfile('avatar')){
            $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
            $siswa->avatar = $request->file('avatar')->getClientOriginalName();
            $siswa->save();
        }
        return redirect('/siswa')->with('sukses','Data berhasil diubah');

    }

    public function delete ($id){
        
        $siswa = \App\Models\Siswa::find($id);
        $siswa -> delete();
        return redirect('/siswa')->with('sukses','Data berhasil dihapus');

    }public function profile ($id){
        
        $siswa = \App\Models\Siswa::find($id);
        return view('/siswa.profile',['siswa' =>$siswa]);

    }
}