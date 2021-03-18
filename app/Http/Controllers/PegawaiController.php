<?php

namespace App\Http\Controllers;
use App\Pegawai;
use Illuminate\Http\Request;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data=Pegawai::all();
        return view('pegawai.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data=Pegawai::all();
        return view('pegawai.tambah',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'nama'=>'required',
            'nip'=>'required|numeric',
            'email'=>'email|unique:pegawai,email|required',
            'alamat'=>'required'
        ]);
        $data=Pegawai::create([
            'nama'=>$request->nama,
            'nip'=>$request->nip,
            'email'=>$request->email,
            'alamat'=>$request->alamat,
        ]);
        return redirect()->route('pegawai.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data=Pegawai::find($id);
        return view('pegawai.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[
            'nama'=>'required',
            'nip'=>'required|numeric',
            'email'=>'email|required',
            'alamat'=>'required'
        ]);
        $data=Pegawai::find($id);
        $data->nama=$request->nama;
        $data->nip=$request->nip;
        $data->email=$request->email;
        $data->alamat=$request->alamat;
        $data->save();
        return redirect()->route('pegawai.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data=Pegawai::findorfail($id);
        $data->delete();
        return redirect()->route('pegawai.index');
    }
}
