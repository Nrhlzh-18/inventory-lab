<?php

namespace App\Http\Controllers;

use App\Models\PengajuanBahan;
use App\Models\PengajuanLayanan;
use App\Models\layanan;
use App\Models\Bahan;
use App\Models\User;
use App\Models\BahanPengajuan;
use App\Models\BahanLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use PDF;

class VerifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = [
            'category_name' => 'verifikasi',
            'page_name' => 'verifikasi',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];

        return view('verifikasi/index', [            
            'pengajuanBahan'        => PengajuanBahan::all(),
            'pengajuanLayanan'      => PengajuanLayanan::all(),
            'bahanPengajuan'        => BahanPengajuan::all(),
            'pengajuanLayananUser'  => PengajuanLayanan::all(),
        ])->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Verifikasi  $verifikasi
     * @return \Illuminate\Http\Response
     */
    public function show(Verifikasi $verifikasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Verifikasi  $verifikasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Verifikasi $verifikasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Verifikasi  $verifikasi
     * @return \Illuminate\Http\Response
     */
    public function tolakpb(Request $request)
    {
        $pengajuanBahan = PengajuanBahan::where('id', $request->id)->first();

        $data = $request->validate([
            'confirmed' => 'required'
        ]);
            
        $pengajuanBahan->update($data);

        toast('Pengajuan telah di tolak','success');
        return redirect('/verifikasi/index');
    }

    public function tolakpl(Request $request)
    {
        $pengajuanLayanan = PengajuanLayanan::where('id', $request->id)->first();

        $data = $request->validate([
            'confirmed' => 'required'
        ]);
            
        $pengajuanLayanan->update($data);

        toast('Pengajuan telah di tolak','success');
        return redirect('/verifikasi/index');
    }

    function search(Request $request)
    {
    
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Verifikasi  $verifikasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Verifikasi $verifikasi)
    {
        //
    }

}
