<?php

namespace App\Http\Controllers;
use App\Absensi;
use App\Pegawai;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data=DB::select("SELECT DISTINCT k.id, a.id_pegawai, k.nama, k.nip, a.tanggal ,k.alamat , k.email
        FROM absensi a
        JOIN pegawai k
        WHERE a.id_pegawai=k.id");
        $karyawan=Pegawai::all();
        return view('Absensi.index',compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $karyawan=Pegawai::all();
        $data=Absensi::all();
        return view('Absensi.tambah',compact('data','karyawan'));
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
            'tanggal'=>'required|date|after_or_equal:today',
            'masuk'=>'required',
            'gaji'=>'numeric|required',
            'keluar'=>'required|after:17:00'
        ]);
        $checkIfExists = Absensi::where(['id_pegawai'=>$request->karyawan, 'tanggal'=>$request->tanggal])->get()->first();

        if(!$checkIfExists){
            $data=Absensi::create([
                'id_pegawai'=>$request->input('karyawan'),
                'tanggal'=>$request->tanggal,
                'masuk'=>$request->masuk,
                'gaji'=>$request->gaji,
                'keluar'=>$request->keluar,
            ]);
                if($request->masuk >'08:15:00'){
                $data->keterangan='Terlambat dan Potongan Gaji';
                $potongan=$data->gaji * 0.01;
                $data->gaji = $data->gaji - $potongan;
                 }elseif($request->masuk <='08:00:00'){
                    $data->keterangan='Masuk Tepat Waktu';
                    }else{
                        $data->keterangan='Tidak Masuk';
                }
                $data->save();
                return redirect()->route('absensi.index');
        }else{
            Session::flash('message', 'Gagal menambahkan data karena sudah ada');
            Session::flash('type', 'danger');
            return back()->withErrors('Gagal menambahkan data karena karyawan sudah melakukan absensi');
        }
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
        $karyawan=Pegawai::all();
        $data=Absensi::all();
        return view('Absensi.tambah',compact('data','karyawan'));
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
    }

    public function laporan(){
        $karyawan=Pegawai::all();
        $data=Absensi::all();
        return view('Laporan.index');
    }

    public function search(Request $request){
        $karyawan=Pegawai::all();
        $mulai=$request->input('mulai');
        $akhir=$request->input('akhir');
        $data=DB::select("SELECT k.id, a.id_pegawai, k.nama, k.nip, a.tanggal ,k.alamat,
        k.email, a.gaji ,a.tanggal, a.masuk, a.keluar, a.keterangan
        From absensi a
        Join pegawai k
        WHERE a.id_pegawai=k.id AND a.tanggal>=$mulai AND
        a.tanggal<=$akhir
        ");
        return view('Laporan.laporan',compact('data'));
    }

    public function detail(){
        $data=DB::select("SELECT DISTINCT k.id, a.id_pegawai, k.nama, k.nip, a.tanggal ,k.alamat , k.email, a.gaji ,a.tanggal, a.masuk, a.keluar, a.keterangan
        FROM absensi a
        JOIN pegawai k
        WHERE a.id_pegawai=k.id");
        $karyawan=Pegawai::all();
        return view('Absensi.detail',compact('data'));
    }
}
