<?php

namespace App\Http\Controllers;

use App\Models\BahanPengajuan;
use App\Models\PengajuanLayanan;
use App\Models\Layanan;
use App\Models\Bahan;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class LoginController extends Controller
{
    public function showFormLogin()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' =>'required'
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            if($user->status == "DE") {

                alert()->error('Login details are not valid','Akun Telah Di Hapus');
                return redirect("/");

            } else {
                request()->session()->regenerate();
                return redirect()->intended('/dashboard');
            } 
        }
        alert()->error('Login details are not valid','password atau email salah');
        return redirect("/");
    }

    public function dashboard()
    {
        $data = [
            'category_name' => 'dashboard',
            'page_name' => 'Dashboard',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
        ];

        if (Auth::check()) {

            //mengambil semua data dari models
            $bahan = Bahan::all();
            $bahanPengajuan = BahanPengajuan::all();
            $pengajuanLayanan = pengajuanLayanan::all();

            $dt = Pengajuanlayanan::select('id','created_at')->get()->groupBy(function($dt){
                return Carbon::parse($dt->created_at)->format('M');
            });
            $as = Bahan::count();
            $asw = Layanan::count();

            //fungsi untuk menampung array
            $kategori = [];
            $stok = [];
            $month = [];
            $monthCount =[];
            
            foreach ($dt as $month => $values) {
                $months[] = $month;
                $monthCount[] = count($values);
            }

            //perulangan dengan foeeach
            foreach($bahan as $kt){
                $kategori[] = $kt->namaReagent;
                $stok[] = $kt->stokBahan;
            }

                return view('/dashboard', [
                    'bahan'             => $bahan,
                    'bahanPengajuan'    => $bahanPengajuan,
                    'pengajuanLayanan'  => $pengajuanLayanan,
                    'kategori'          => $kategori,
                    'stok'              => $stok,
                    'as'                => $as,
                    'asw'               => $asw,
                    'month'             => $months,
                    'monthCount'        => $monthCount 
                ])->with($data);
        }

    }

    public function update(Request $request, Users $user){
        $request->validate([
            'password' => 'required'
        ]);
        // $rules = [
        //     'password' => bcrypt($request->password)
        // ] ;
        // // dd($rules);

        // $validateData = $request->validate($rules);

        Users::where("id", $user->id)->update([
            'password' => bcrypt($request->password)
        ]);
        alert()->success('success','password user berhasil di update');
        return redirect("/user");
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return redirect('/');
    }

    public function chart()
      {
        $result = DB::table('bahan')
                    ->where('stokBarang', 'namaReagent')
                    ->orderBy('id')
                    ->get();
        return response()->json($result);
      }
}
