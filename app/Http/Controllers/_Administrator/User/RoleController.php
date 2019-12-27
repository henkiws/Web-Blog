<?php

namespace App\Http\Controllers\_Administrator\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('_Administrator.users.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission_read = Permission::where('name','like','%read%')->pluck('name',"id");
        $permission_create = Permission::where('name','like','%create%')->pluck('name',"id");
        $permission_update = Permission::where('name','like','%update%')->pluck('name',"id");
        $permission_delete = Permission::where('name','like','%delete%')->pluck('name',"id");
        $notMatch = [
            ['name', 'not like', '%read%'],
            ['name', 'not like', '%create%'],
            ['name', 'not like', '%update%'],
            ['name', 'not like', '%delete%']
        ];
        $permission_optional = Permission::where($notMatch)->pluck('name',"id");
        return view('_Administrator.users.role.form', compact('permission_read','permission_create','permission_update','permission_delete','permission_optional'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name]);
        // give permission
        foreach($request->permission as $item){
            $role->givePermissionTo($item);
        }

        return redirect('administrator/role/users');
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
        $data = Role::findOrFail($id);
        $permission_read = Permission::where('name','like','%read%')->pluck('name',"id");
        $permission_create = Permission::where('name','like','%create%')->pluck('name',"id");
        $permission_update = Permission::where('name','like','%update%')->pluck('name',"id");
        $permission_delete = Permission::where('name','like','%delete%')->pluck('name',"id");
        $notMatch = [
            ['name', 'not like', '%read%'],
            ['name', 'not like', '%create%'],
            ['name', 'not like', '%update%'],
            ['name', 'not like', '%delete%']
        ];
        $permission_optional = Permission::where($notMatch)->pluck('name',"id");
        $rolePermisson = Role::findByName($data->name)->permissions;
        return view('_Administrator.users.role.form',compact('data','permission_read','permission_create','permission_update','permission_delete','permission_optional','rolePermisson'));
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
        $find = Role::findOrFail($id);

        $find->update(['name'=>$request->name]);
        
        $role = Role::findByName($find->name)->permissions;
        foreach($role as $item){ // revoke permisson
            foreach($request->permission as $val){
                if( $item->name !== $val ){
                    $find->revokePermissionTo($item->name);
                }
            }    
        }

        foreach($request->permission as $item){ // add new permission role
            $find->givePermissionTo($item);
        }

        return redirect('administrator/role/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find = Role::findOrFail($id);

        $find->delete();

        return response()->json(true);
    }

    public function source(){
        $data = Role::get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('name', function($row) {
                    return $row->name;
                })
                ->editColumn('guard', function($row) {
                    return $row->guard_name;
                })
                ->addColumn('action', function($row){
                    $editButton = '<a href="'.url('administrator/role/users/'.$row->id.'/edit').'" class="btn btn-icon waves-effect btn-warning waves-light"> <i class="fa fa-edit"></i> </a>';
                    $deleteButton = '<button class="btn btn-icon waves-effect btn-danger waves-light del-data" data="'.$row->id.'"> <i class="fa fa-trash-o"></i> </button>';
                    return $editButton.' &nbsp; '.$deleteButton;   
                })
                ->rawColumns(['action','status'])
                ->make(true);
    }

}
