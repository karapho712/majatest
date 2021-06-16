<?php

namespace Modules\Hadiah\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Hadiah\Entities\Hadiah;
use DB;

class HadiahController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $data = Hadiah::limit('100')->get();

        return view('hadiah::index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('hadiah::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
                

        $data = $request->all();

        Hadiah::create($data);

        return redirect('hadiah')->with('message', 'Data Berhasil Di Tambah');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('hadiah::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $data = Hadiah::findOrFail($id);

        return view('hadiah::edit')->with('data', $data);
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
        $item = Hadiah::findOrFail($id);
        $item->update($data);

        return redirect('hadiah')->with('message', 'Data Berhasil Di Update');
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
            Hadiah::whereId($id)->delete();

            DB::commit();

            return redirect('hadiah')->with('message', 'Data Berhasil Di Delete');
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
            // something went wrong
        }
    }
}
