<?php

namespace App\Http\Controllers;

use App\Models\PengajuanBahan;
use App\Models\Layanan;
use App\Models\BahanLayanan;
use App\Models\Bahan;
use App\Models\User;
use App\Models\BahanPengajuan;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class BahanPengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'category_name' => 'pengajuanBahan',
            'page_name' => 'pengajuanBahan',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];
        return view('pengajuan/pengajuanBahan', [
            'pengajuanBahan' => PengajuanBahan::all(),
            'bahanPengajuan' => BahanPengajuan::all(),
            'bahan'         => Bahan::all(),
            'user'          => User::all()
        ])->with($data);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        foreach ($request->bahanId as $key => $b) {
            $bahan       = Bahan::where('id', $b)->first();

            $anjas = [
                'userId'                => Auth::user()->id,
                'keterangan'            => $request->keterangan,
                'bahanId'               => $b,
                'tanggalPengajuan'      => $request->tanggalPengajuan,
                'stokBahan'             => $request->stokBahan[$key]
            ];

            BahanPengajuan::create($anjas);
            toast('wait for verifikasi', 'success');
        }
        
        
        return redirect("/pengajuanBahan/create");
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
        foreach ($request->bahanId as $key => $b) {

            $pengajuanbhn = BahanPengajuan::where('bahanId', $b)->value('stokBahan');
            $bahan = Bahan::find($b);
            $substract = intval($bahan->stokBahan + $pengajuanbhn);
            $bahan->stokBahan = intval($substract);
            $bahan->save();

            $rules = [
                'confirmed' => 'required',
                'tanggalVerifikasi' => 'required',
                'userVerifikasi' => 'required'
            ];

            //validasi data sesuai isi rules
            $validateData = $request->validate($rules);
            
            $pengajuanBhn->update($validateData);
        }

        toast('Sudah di Verifikasi', 'success');
        return redirect("/verifikasiBahan")->with('succes',"bahan data has been created");
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
}
