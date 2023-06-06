<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employe;
use App\Grupkriteria;
class EmployeController extends Controller
{
    //
    public function index(Request $request){

        $employes = Employe::query();
        if($request->grupkriteria_id){
            $employes = $employes->where('grupkriteria_id',$request->grupkriteria_id);

        } 
        $employes = $employes->get();

        $grupkriteria = Grupkriteria::get();
        return view('dashboard.admin.employe.index',compact('employes','grupkriteria'));

    }
    public function destroy($id){
        $employe = Employe::findOrFail($id);
        $employe->delete();
        return redirect()->route('employe')->withSuccess('Hapus Data Siswa');
    }
    public function create(){
        $grupkriteria = Grupkriteria::get();
        return view('dashboard.admin.employe.create',compact('grupkriteria'));
    }
    public function store(Request $request){
        request()->validate($this->validation());
        try {
            $employe = Employe::create($this->field());
            
        } catch (\Throwable $th) {
            info($th->getMessage());
            return redirect()->route('employe.create')->withErrors('Input Data Siswa Gagal');
            
        }
        return redirect()->route('employe')->withSuccess('Input Data Siswa Sukses');
    }

    public function edit($id){
        $employe = Employe::where('id',$id)->first();
        return view('dashboard.admin.employe.edit',compact('employe'));

    }
    public function update($id,Request $request){
        request()->validate($this->validation());
        try {
            $employe = Employe::findOrFail($id);
            $employe->update($this->field());
            
        } catch (\Throwable $th) {
            return redirect()->route('employe.create')->withErrors('Input Data Siswa Gagal');
            
        }
        return redirect()->route('employe')->withSuccess('Input Data Siswa Sukses');
    }

    public function validation(){
        return [
            'full_name'=>['required'],
            'grupkriteria_id'=>['required'],
            'gender'=>['required','in:Laki-laki,Perempuan'],
            'class'=>['required'],
            'birth_date'=>['required'],
            'address'=>['required'],
            'position'=>['required'],
        ];
    }
    public function field(){
        return [
            'grupkriteria_id'=>request('grupkriteria_id'),
            'full_name'=>request('full_name'),
            'gender'=>request('gender'),
            'class'=>request('class'),
            'birth_date'=>request('birth_date'),
            'address'=>request('address'),
            'position'=>request('position'),
        ];
    }
}
