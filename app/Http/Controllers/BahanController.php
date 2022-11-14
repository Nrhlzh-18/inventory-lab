<?php

namespace App\Http\Controllers;

use App\Models\Bahan;
use App\Models\BahanLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class BahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $bahans = Bahan::all();
        $data = [
            'category_name' => 'bahan',
            'page_name' => 'bahan',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];  

        return view('bahan.index', compact('bahans'))->with($data);  
        
        
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("bahan.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validateData = $request->validate([
            'kodeBarang'    => 'required',
            'namaReagent'    => 'required',
            'spesifikasi'   => 'required',
            'stokBahan'     => 'required',
            'satuan'        => 'required',
            'stokMinimum'   => 'required',
            'hargaSatuan'   => 'required',
            'penyedia'      => 'required',
            'tempatPenyimpanan' => 'required',
            'keterangan'    => 'required',
            'foto'          => 'image|file'
        ]);

        //jika user mengupload file foto menu
        if ($request->file('foto')) {
            $validateData['foto']= $request->file('foto')->store('images');
        }


        Bahan::create($validateData);
        alert()->success('success','data bahan berhasil di tambahkan');
        return redirect("/bahan");
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
        return view('bahan.edit', [
            'bahan' => $bahan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, bahan $bahan)
    {
        $rules = [
            'kodeBarang'    => 'required',
            'namaReagent'   => 'required',
            'spesifikasi'   => 'required',
            'stokBahan'     => 'required',
            'satuan'        => 'required',
            'stokMinimum'   => 'required',
            'hargaSatuan'   => 'required',
            'penyedia'      => 'required',
            'tempatPenyimpanan' => 'required',
            'keterangan'    => 'required',
            'foto'          => 'image|file'
        ];

        //validasi data sesuai isi rules
        $validateData = $request->validate($rules);

        //cek apakah ada img baru atau tidak
        if ($request->file('foto')) {
            //hapus gambar yang lama
            Storage::delete($bahan->foto);
            $validateData['foto'] = $request->file('foto')->store('images');
        }

        Bahan::where("id", $bahan->id)->update( $validateData );
        alert()->success('success','data bahan berhasil di edit');
        return redirect('/bahan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bahan $bahan)
    {
        Bahan::destroy($bahan->id);

        //untuk men delete gambar
        if ($bahan->foto) {
            Storage::delete($bahan->foto);
        }

        BahanLayanan::where('bahanId', $bahan->id)->delete();

        alert()->success('success','data bahan berhasil di hapus');
        return redirect("/bahan");
    }

    public function cetak()
    {
        $bahan = Bahan::all();
 
        $pdf = PDF::loadview('/cetak', ['bahan' => $bahan]);
        return $pdf->download('laporan_Bahan.pdf');
    }
}
