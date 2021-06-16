<?php

namespace Modules\Barang\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Barang\Entities\Barang;
use DB;


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = Barang::limit('100')->get();

        return view('barang::index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('barang::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        Barang::create($data);

        return redirect('barang')->with('message', 'Data Berhasil Di Tambah');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('barang::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data = Barang::findOrFail($id);

        return view('barang::edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        // User::whereId($id)->update($requestx);
        $item = Barang::findOrFail($id);
        $item->update($data);

        return redirect('barang')->with('message', 'Data Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();

        try {
            Barang::whereId($id)->delete();

            DB::commit();

            return redirect('barang')->with('message', 'Data Berhasil Di Delete');
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
            // something went wrong
        }
    }
}
