<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Auth;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'create', 'store', 'show', 'edit', 'update','destroy']]);
    }

     
    public function index()
    {
        return view('user::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('user::create');
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
        return view('user::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        return view('user::edit');
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

    public function cek()
    {
        // return response()->json(auth('api')->user());
        // dd(auth('api')->user()->id);

        $pointuser = DB::table('users_point')->where('id_user', auth('api')->user()->id)->first();

        $datahadiah = DB::table('hadiah')->limit(100)->get();

        // dd($pointuser, $datahadiah, 'INI API');

        return response()->json([
            'status' => 'success',
            'pointuser' => $pointuser->point,
            'list_hadiah'=>$datahadiah
        ]);

        // return response()->json($this->guard('api')->user());
    }

    public function guard()
    {
        return Auth::guard();
    }
}
