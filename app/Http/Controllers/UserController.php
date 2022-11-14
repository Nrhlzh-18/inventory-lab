<?php

namespace App\Http\Controllers;

use App\Models\PengajuanBahan;
use App\Models\Bahan;
use App\Models\Users;
use App\Models\BahanPengajuan;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'category_name' => 'user',
            'page_name' => 'user',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
            
        ];

        return view('user.index', [
            'user' => Users::all()->where('status', 'ACT')
        ])->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data = [
        //     'category_name' => 'user',
        //     'page_name' => 'user',
        //     'has_scrollspy' => 0,
        //     'scrollspy_offset' => '',
        //     'alt_menu' => 0,
        // ];

        // return view('/user/create')->with($data);
    }

    // public function read()
    // {
    //     $user = Users::all();
    //     $data = [
    //         'category_name' => 'user',
    //         'page_name' => 'user',
    //         'has_scrollspy' => 0,
    //         'scrollspy_offset' => '',
    //         'alt_menu' => 0,

    //     ]; 

    //     return view('/user/read', compact('user'))->with($data);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Users::create([
            'name'   => $request->name,
            'email'      => $request->email,
            'password'         => bcrypt($request->password),
            'role'     => $request->role,
            'status' => 'ACT'
        ]);
        alert()->success('success','data user berhasil di tambahkan');
        return redirect("/user");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PengajuanBahan  $pengajuanBahan
     * @return \Illuminate\Http\Response
     */
    public function show(PengajuanBahan $pengajuanBahan)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PengajuanBahan  $pengajuanBahan
     * @return \Illuminate\Http\Response
     */
    public function edit(PengajuanBahan $pengajuanBahan)
    {
        
    }

    public function change(Request $request, Users $user){
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PengajuanBahan  $pengajuanBahan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $user)
    {
        if($request->password != null){
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
        } else if($request->foto != null){
            $rules = [
                'foto' => 'image|file'
            ] ;
            
            $validateData = $request->validate($rules);

            if ($request->file('foto')) {
                //hapus gambar yang lama
                Storage::delete($user->foto);
                $validateData['foto'] = $request->file('foto')->store('profil');
            }
    
            Users::where("id", $user->id)->update( $validateData );
    
            alert()->success('success','Photo Profile berhasil di update');
            return redirect("/dashboard");
        } else {
            $rules = [
            'name' => 'required',
            'email' => 'required',
            'role'=> 'required'
            ];
        

        $validateData = $request->validate($rules);

        Users::where("id", $user->id)->update( $validateData );

        alert()->success('success','data user berhasil di update');
        return redirect("/user");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PengajuanBahan  $pengajuanBahan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Users $user)
    {
        $user = Users::find($user->id);
        $user->status = 'DE';
        $user->save();
        // Users::where('id', $id)->delete();
       
        // return back()->with('success','Member deleted successfully');
        alert()->success('success','data user berhasil di hapus');
        return redirect("/user");
    }
}