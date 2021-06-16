<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\User;
use DB;
use Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        return view('layout::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('admin::create');
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
        return view('admin::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('admin::edit');
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

    public function lihatuser()
    {
        $user = DB::table('users')->where('id', '>', '1')->get();

        return view('admin::user')->with('user', $user);
    }

    public function createuser()
    {
        return view('admin::create');
    }

    public function storeuser(Request $request)
    {
        $data = $request->all();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect('admin/user')->with('message', 'Data Berhasil Di Tambah');
    }

    public function edituser($id)
    {
        $data = User::findOrFail($id);

        return view('admin::edit')->with('data', $data);
    }

    public function updateuser(Request $request, $id)
    {
        // dd('updateuser', $id, $request->all());

        $requestx = $request->except(['_token', '_method','password_confirmation']);
        $requestx['password'] = Hash::make($request->password);

        User::whereId($id)->update($requestx);

        return redirect('admin/user')->with('message', 'Data Berhasil Di Update');
    }

    public function deleteuser($id)
    {
        DB::beginTransaction();

        try {
            User::whereId($id)->delete();

            DB::commit();

            return redirect('admin/user')->with('message', 'Data Berhasil Di Delete');
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
            // something went wrong
        }

    }
}
