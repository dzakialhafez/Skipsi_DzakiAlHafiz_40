<?php

namespace App\Http\Controllers;

use App\grupkriteria;
use Illuminate\Http\Request;
Use Alert;

class grupkriteriaController extends Controller
{
    //
    public function index(){
        $data = grupkriteria::orderBy('grupkriteria_code','Asc')->get();
        // return $data;
        return view('dashboard.admin.grupkriteria.index', compact('data'));
    }
    public function destroy(grupkriteria $grupkriteria){
        $grupkriteria->delete();
        
        return redirect()->route('grupkriteria')->withSuccess('Hapus Kelas Berhasil');
    }
    public function store(Request $request){
        request()->validate([
            'grupkriteria_code'=>['required','unique:grupkriteria,grupkriteria_code'],
            'name'=>['required'],
        ]);
        $grupkriteria = grupkriteria::create([
            'grupkriteria_code'=>request('grupkriteria_code'),
            'name'=>request('name'),
        ]);
        return redirect()->route('grupkriteria')->withSuccess('Tambah Kelas Baru Berhasil');
    }
    public function edit($id){
        $grupkriteria = grupkriteria::findOrFail($id);
        return view('dashboard.admin.grupkriteria.edit',compact('grupkriteria'));

    }
    public function update($id,Request $request){
        $grupkriteria = grupkriteria::findOrFail($id);
        $grupkriteria->update([
                'grupkriteria_code'=>request('grupkriteria_code'),
                'name'=>request('name'),
              
            ]);
            return redirect()->route('grupkriteria')->withSuccess('Kelas Berhasil Diperbarui');
    }
    public function show($id){
        $grupkriteria = grupkriteria::findOrFail($id);
        // dd($criteria->sub_criteria);
        return view('dashboard.admin.grupkriteria.show',compact('grupkriteria'));

    }
    
}
