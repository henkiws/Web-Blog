<?php

namespace App\Http\Controllers\_Administrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use DataTables;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $role = Role::Pluck('name','name');

        return view('_Administrator.users.user',compact('role'));
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
        $data = User::create($request->all());

        $data->assignRole($request->role);

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
        $data = User::with('roles')->where('id',$id)->first();

        $data = [
            "id" => $data->id,
            "name" => $data->name,
            "email" => $data->email,
            "password" => null,
            "role" => $data->roles[0]->name
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
        $user = User::findOrFail($id);

        $user->update($request->all());

        $user->syncRoles($request->role);

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
        $find = User::findOrFail($id);

        $find->delete();

        return response()->json(true);
    }

    public function source()
    {
        $data = User::with('roles')->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->editColumn('name', function($row) {
                return $row->name;
            })
            ->editColumn('email', function($row) {
                return $row->email;
            })
            ->editColumn('role', function($row) {
                $role = "";
                foreach($row->roles as $val){
                    $role = $val->name.', '.$role;
                }
                rtrim($role,',');
                return $role;
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
