<?php

namespace App\Http\Controllers\_Administrator\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Model\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::Pluck('name','id');

        return view('_Administrator.management.category.index',compact('category'));
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
        $data = [
            "name" => $request->name,
            "parent_id" => $request->parent_id == "null" ? null : $request->parent_id
        ];

        Category::create($data);

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
        $data = Category::findOrFail($id);

        $data = [
            "id" => $data->id,
            "name" => $data->name,
            "parent_id" => $data->parent_id
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
        $find = Category::findOrFail($id);

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
        $find = Category::findOrFail($id);

        $find->delete();

        return response()->json(true);
    }

    public function source(){
        $data = Category::get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('level', function($row) {
                    return $row->parent_id == null ? '<span class="label label-danger">Parent Category</span>' : '<span class="label label-inverse">Sub Category</span>';
                })
                ->editColumn('tier', function($row) {
                    return  $row->parent_id == null ? $row->name : 'parent → sub → sub';
                })
                ->addColumn('action', function($row){
                    $editButton = '<button class="btn btn-icon waves-effect btn-warning waves-light show-data" data="'.$row->id.'"> <i class="fa fa-edit"></i> </button>';
                    $deleteButton = '<button class="btn btn-icon waves-effect btn-danger waves-light del-data" data="'.$row->id.'"> <i class="fa fa-trash-o"></i> </button>';
                    return $editButton.' &nbsp; '.$deleteButton;            
                })
                ->rawColumns(['action','level','tier'])
                ->make(true);
    }
    
}
