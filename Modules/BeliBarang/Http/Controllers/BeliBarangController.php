<?php

namespace Modules\BeliBarang\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Barang\Entities\Barang;
use DB;
use Auth;

class BeliBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = Barang::limit('100')->get();

        return view('belibarang::index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('belibarang::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('belibarang::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('belibarang::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function cekpoint()
    {
        $pointuser = DB::table('users_point')->where('id_user', Auth::user()->id)->first();

        $datahadiah = DB::table('hadiah')->limit(100)->get();
        // dd($pointuser, $datahadiah, 'cekpoint');

        return view('belibarang::cekpoint')->with(['pointuser'=> $pointuser, 'datahadiah'=>$datahadiah]);
    }
}
