<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PesertaController extends Controller
{ 
    public function index(Request $request)
    { 
        $data = Peserta::get();
        return view('peserta.index', compact('data')); 
    } 

    public function getClientData (Request $request){
        $data = Peserta::select('*');
        return response()->json(['data' => $data->get()]);
    }

    public function getServerData (Request $request){
        $data = Peserta::select('*');
        return DataTables::of($data)->addIndexColumn()->make(true);
    } 
 
    public function create()
    {
        return view('peserta.create');
    }
 
    public function store(Request $request)
    {  
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'emel' => 'required|email',
            'jantina' => 'required|string',
            'no_telefon' => 'required|string', 
        ], [
            'nama.required' => 'Sila isi nama anda.',
            'emel.required' => 'Sila isi e-mel anda.',
            'emel.email' => 'Pastikan e-mel dalam format yang betul.',
            'jantina.required' => 'Sila pilih jantina.',
            'no_telefon.required' => 'Sila isi nombor telefon anda.',
        ]); 

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        } 

        $validated = $validator->validated();

        Peserta::create([
            'nama' => $validated['nama'],
            'emel' => $validated['emel'],
            'jantina' => $validated['jantina'],
            'no_telefon' => $validated['no_telefon'],
        ]);
        return redirect()->route('peserta.index')->with('success', 'Peserta berjaya didaftarkan!'); 
    }  

    public function edit(string $id)
    {
        $peserta = Peserta::findOrFail($id);
        return view('peserta.edit', compact('peserta'));
    }
 
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string',
            'emel' => 'required|email',
            'jantina' => 'required|string',
            'no_telefon' => 'required|string', 
        ],[
            'nama.required' => 'Sila isi nama anda.',
            'emel.required' => 'Sila isi e-mel anda.',
            'emel.email' => 'Pastikan e-mel dalam format yang betul.',
            'jantina.required' => 'Sila pilih jantina.',
            'no_telefon.required' => 'Sila isi nombor telefon anda.',
        ]); 

        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        } 

        $validated = $validator->validated();
        $peserta = Peserta::findOrFail($id);
        $peserta->update([
            'nama' => $validated['nama'],
            'emel' => $validated['emel'],
            'jantina' => $validated['jantina'],
            'no_telefon' => $validated['no_telefon'],
        ]);
        return redirect()->back()->with('success', 'Maklumat peserta berjaya dikemaskini!');
    } 
    
    public function destroy(string $ids) {
        $idArray = explode(',', $ids);
        Peserta::whereIn('id', $idArray)->delete();
        return response()->json(['success' => true]);
    }
}
