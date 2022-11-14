<?php

namespace App\Http\Controllers;

use App\Models\PengajuanLayanan;
use App\Models\layanan; 
use App\Models\Pengujian;
use App\Models\BahanLayanan;
use Illuminate\Http\Request;
use App\Models\Bahan;
use DB;

class PengajuanLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'category_name' => 'pengajuanLayanan',
            'page_name' => 'pengajuanLayanan',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];

        return view('pengajuan/pengajuanLayanan', [
            'pengujian'         => Pengujian::all(),
            'layanan'           => Layanan::all(),
            'pengajuanLayanan'  => PengajuanLayanan::all()
        ])->with($data);

    }


    public function parameter(Request $request)
    {
        $data['parameter'] = Layanan::where("pengujianId",$request->pengujianId)->get(["parameter", "id"]);
        return response()->json($data);
    }

    public function bahan(Request $request)
    {
        $bahanLayanan = BahanLayanan::where("layananId", $request->layananId);
        
        foreach ($bahanLayanan->bahanId as $b) {
            $data['bahan'] = Bahan::where("id", $b)->get(["namaReagent", "id"]);
        }

        

        return response()->json($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PengajuanLayanan::create([
            'userId'            => $request->userId,
            'tanggalPengajuan'   => $request->tanggalPengajuan,
            'layananId'         => $request->layananId,
            'keterangan'        => $request->keterangan,
        ]);
        toast('wait for verifikasi', 'success');
        return redirect("/pengajuanLayanan/create")->with('succes',"bahan data has been created");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PengajuanLayanan  $pengajuanLayanan
     * @return \Illuminate\Http\Response
     */
    public function show(PengajuanLayanan $pengajuanLayanan)
    {
        //
    } 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PengajuanLayanan  $pengajuanLayanan
     * @return \Illuminate\Http\Response
     */
    public function edit(PengajuanLayanan $pengajuanLayanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PengajuanLayanan  $pengajuanLayanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PengajuanLayanan $pengajuanLayanan)
    {
        if ($request->bahanId == null) {
            alert()->warning('Peringatan!!','Bahan belum di input pada parameter ini, Silahkan input bahan yang dibutuhkan terlebih dahulu di Layanan');
            return redirect()->back()->with();
        }

        foreach ($request->bahanId as $key => $b) {

            $pl = BahanLayanan::where('bahanId', $b)->value('stokBahan');
            $bahan = Bahan::find($b);
            $substract = intval($bahan->stokBahan - $pl);

            if ($substract <= $bahan->stokMinimum) {
                toast('data tidak tersedia', 'error');
                return redirect("/verifikasi/layanan/index")->with('succes',"bahan data has been created");
            }
        }

        foreach ($request->bahanId as $key => $b) {

            $pl = BahanLayanan::where('bahanId', $b)->value('stokBahan');
            $bahan = Bahan::find($b);
            $substract = intval($bahan->stokBahan - $pl);
            $bahan->stokBahan = intval($substract);
            $bahan->save();

            $data = $request->validate([
                'confirmed'         => 'required',
                'userVerifikasi'    => 'required',
                'tanggalVerifikasi' => 'required'
            ]);
                
            $pengajuanLayanan->update($data);  
        }

        toast('Sudah di Verifikasi', 'success');
        // dd($data);

        
        //kembali ke halaman awal
        return redirect("/verifikasiLayanan")->with('succes',"bahan data has been created");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PengajuanLayanan  $pengajuanLayanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PengajuanLayanan $pengajuanLayanan)
    {
        //
    }

    public function autocomplete(Request $request)
    {
        $data = [];
  
        if($request->filled('q')){
            $data = Bahan::select("namaReagent", "id")
                        ->where('namaReagent', 'LIKE', '%'. $request->get('q'). '%')
                        ->get();
        }
    
        return response()->json($data);
    }
}
