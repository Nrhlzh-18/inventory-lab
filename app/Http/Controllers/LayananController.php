<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;
use App\Models\Bahan;
use App\Models\BahanLayanan;
use App\Models\Pengujian;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'category_name' => 'layanan',
            'page_name' => 'layanan',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];
        return view('layanan.index', [
            'layanan'       => Layanan::all(),
            'bahan'         => Bahan::all(),
            'pengujian'     => Pengujian::all()
        ])->with($data);

    }
  
    public function create()
    {

    }
  
    public function store(Request $request)
    {
        $as = Layanan::create([
            'pengujianId'       => $request->pengujianId,
            'parameter'         => $request->parameter,
        ]);

        foreach ($request->bahanId as $key => $b) {
            $bahan       = Bahan::where('id', $b)->first();

            $data_bahan_layanan = [
                'layananId'     => $as->id,
                'bahanId'       => $b,
                'stokBahan'     => $request->stokBahan[$key]
            ];

            BahanLayanan::create($data_bahan_layanan);
        } 
        alert()->success('success','data bahan berhasil di tambahkan');
        return redirect('/layanan');
    }
  
    public function edit($id)
    {
        return view('layanan.index', [
            'layanan' => Layanan::where('id', $id)->first()
        ]);
    }

    public function update(Request $request, Layanan $layanan)
    {
        $request->validate([
            'pengujianId'         => ['required'],
            'parameter'         => ['required'],
            'bahanId'           => ['required'],
            'stokBahan'         => ['required']

        ]);


        $as = [
            'pengujianId'   => $request->pengujianId,
            'parameter'     => $request->parameter
        ];

        Layanan::where('id', $layanan->id)->update($as);
        BahanLayanan::where('layananId', $layanan->id)->delete();
        

        foreach ($request->bahanId as $key => $b) {

            $data_bahan_layanan = [
                'layananId'     => $layanan->id,
                'bahanId'       => $b,
                'stokBahan'     => $request->stokBahan[$key]
            ];

            BahanLayanan::create($data_bahan_layanan);
        }

        
        alert()->success('success','data bahan berhasil di edit');
        return redirect('/layanan');
    }

    public function destroy($id)
    {
        Layanan::where('id', $id)->delete();
        BahanLayanan::where('layananId', $id)->delete();
       
        alert()->success('success','data bahan berhasil di hapus');
        return back()->with('success','Member deleted successfully');
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->ids;
        Layanan::whereIn('id',explode(",",$ids))->delete();
        BahanLayanan::whereIn('layananId',explode(",",$layananIds))->delete();
        return response()->json(['success'=>"Products Deleted successfully."]);
    }
}
