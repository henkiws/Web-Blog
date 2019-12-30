<?php

namespace App\Http\Controllers\_Administrator\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Model\Post;
use App\Traits\UploadTrait;

class PostController extends Controller
{
    use UploadTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('_Administrator.management.post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('_Administrator.management.post.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Post::create($request->all());

        // upload image
        $image = $this->upload($request->file('file'), 'assets/'.$user->username.'/product/'.$product_id,true);

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
        $data = Post::findOrFail($id);

        return view('_Administrator.management.post.form',compact('data'));
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
        $find = Post::findOrFail($id);

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
        $find = Post::findOrFail($id);

        $find->delete();

        return response()->json(true);
    }

    public function source(){
        $data = Post::get();
        return Datatables::of($data)
                ->addIndexColumn()
                ->editColumn('image', function($row) {
                    return 'image';
                })
                ->editColumn('title', function($row) {
                    return $row->post_title;
                })
                ->editColumn('author', function($row) {
                    return 'author';
                })
                ->editColumn('category', function($row) {
                    return 'category';
                })
                ->editColumn('tag', function($row) {
                    return 'tag';
                })
                ->editColumn('status', function($row) {
                    return '<span class="label label-default">'.$row->post_status.'</span>';
                })
                ->addColumn('action', function($row){
                    $editButton = '<button class="btn btn-icon waves-effect btn-warning waves-light show-data" data="'.$row->id.'"> <i class="fa fa-edit"></i> </button>';
                    $deleteButton = '<button class="btn btn-icon waves-effect btn-danger waves-light del-data" data="'.$row->id.'"> <i class="fa fa-trash-o"></i> </button>';
                    return $editButton.' &nbsp; '.$deleteButton;            
                })
                ->rawColumns(['action','status'])
                ->make(true);
    }

}
