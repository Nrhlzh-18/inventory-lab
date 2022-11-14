<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Bahan;
use App\Models\Layanan;
use App\Models\BahanPengajuan;
use App\Models\BahanLayanan;
use App\Models\PengajuanLayanan;
use PDF;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdfBahan()
    {
        $bahan = Bahan::all();
        
        $pdf = PDF::loadview('/bahan/cetak', ['bahan' => $bahan])->setPaper($bahan, 'landscape');
        return $pdf->download('laporan_Bahan.pdf');
    }

    public function pdfUser()
    {
        $user = User::all();
        
        $pdf = PDF::loadview('/user/cetak', ['user' => $user]);
        return $pdf->download('laporan_user.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdfLayanan()
    {
        $layanan = Layanan::all();
 
        $pdf = PDF::loadview('/layanan/cetak', ['layanan' => $layanan])->setPaper($layanan, 'landscape');
        return $pdf->download('laporan_pengujian.pdf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pdfPengajuanLayanan()
    {
        $pengajuanLayanan = PengajuanLayanan::all();
 
        $pdf = PDF::loadview('/verifikasi/cetakpl', ['pengajuanLayanan' => $pengajuanLayanan])->setPaper($pengajuanLayanan, 'landscape');
        return $pdf->stream('laporan_pengajuan_layanan.pdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pdfPengajuanBahan()
    {
        $bahanPengajuan = BahanPengajuan::all();
 
        $pdf = PDF::loadview('/verifikasi/cetakpb', ['bahanPengajuan' => $bahanPengajuan])->setPaper($bahanPengajuan, 'landscape');;
        return $pdf->stream('laporan_pengajuan_Bahan.pdf');
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
}
