<?php

namespace App\Http\Controllers\_Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use DataTables;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('_Administrator.users.permission');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Permission::create(['name' => $request->name]);

        return response()->json(true);
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
        $data = Permission::findOrFail($id);

        $data = [
            "id" => $data->id,
            "name" => $data->name
        ];

        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $find = Permission::findOrFail($id);

        $find->update($request->all());

        return response()->json(true);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find = Permission::findOrFail($id);

        $find->delete();

        return response()->json(true);
    }

    public function source(){
        $data = Permission::get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('guard', function($row) {
                    return $row->guard_name;
                })
                ->addColumn('action', function($row){
                    $editButton = '<button class="btn btn-icon waves-effect btn-warning waves-light show-data" data="'.$row->id.'"> <i class="fa fa-edit"></i> </button>';
                    $deleteButton = '<button class="btn btn-icon waves-effect btn-danger waves-light del-data" data="'.$row->id.'"> <i class="fa fa-trash-o"></i> </button>';
                    return $editButton.' &nbsp; '.$deleteButton;            
                })
                ->rawColumns(['action'])
                ->make(true);
    }
}
