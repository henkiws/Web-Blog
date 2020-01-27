<?php

namespace App\Http\Controllers\_Administrator\Management;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DataTables;
use App\Model\Post;
use App\Model\PostMeta;
use App\Model\TagPost;
use App\Model\Tag;
use App\Model\Category;
use App\Model\Media;
use App\Traits\UploadTrait;
use Auth;
use DB;
use Alert;

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
        $post = Post::with(['image','user'])->paginate();
        
        return view('_Administrator.management.post.index', compact('post'));
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
        DB::beginTransaction();
        try{
            // POST
            $post = [
                "post_author" => Auth::id(),
                "post_title" => $request->post_title,
                "post_content" => $request->post_content,
                "post_type" => "post", // post,page,revision
                "post_status" => $request->post_status,
                "comment_status" => $request->comment_status,
                "category_id" => (int)$request->category
            ];
            $res = Post::create($post);
            
            // META
            $meta = ['title','description'];
            $postMeta = [];
            foreach( $meta as $key => $item ){
                $postMeta[] = [
                    "post_id" => $res->id,
                    "meta_key" => $item,
                    "meta_value" => $request->meta[$key] 
                ];
            }
            PostMeta::insert($postMeta);

            // MEDIA
            $media = [
                "fk" => $res->id,
                "media_name" => $request->image,
                "media_path" => $request->image,
                "media_type" => 'post',
                "media_status" => 'publish'
            ];
            Media::create($media);

            // TAGS
            $tags = explode(',',$request->tags);
            foreach( $tags as $item ){
                $tag = Tag::firstOrCreate(['name' => $item]);
                $tagPost = [
                    "post_id" => $res->id,
                    "tag_id" => $tag->id
                ];
                $tagPost = TagPost::create($tagPost);
            }
            DB::commit();
            // Alert::success('Success', 'Good Job!');
            return redirect('administrator/management/post')->with('success','Good Job!');
        }catch(\Exception $e){
            DB::rollback();
            return redirect('administrator/management/post/create')->with('error','Something Went Wrong!');
        }

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
        $data = Post::with(['user','image','meta','category','tags.tag'])->findOrFail($id);

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
        DB::beginTransaction();
        try{
            // POST
            $find = Post::findOrFail($id);
            $post = [
                "post_author" => Auth::id(),
                "post_title" => $request->post_title,
                "post_content" => $request->post_content,
                "post_type" => "post", // post,page,revision
                "post_status" => $request->post_status,
                "comment_status" => $request->comment_status,
                "category_id" => (int)$request->category
            ];
            $res = $find->update($post);
            
            // META
            PostMeta::where('post_id',$id)->delete();
            $meta = ['title','description'];
            $postMeta = [];
            foreach( $meta as $key => $item ){
                $postMeta[] = [
                    "post_id" => $id,
                    "meta_key" => $item,
                    "meta_value" => $request->meta[$key] 
                ];
            }
            PostMeta::insert($postMeta);

            // MEDIA
            Media::where('fk',$id)->delete();
            $media = [
                "fk" => $id,
                "media_name" => $request->image,
                "media_path" => $request->image,
                "media_type" => 'post',
                "media_status" => 'publish'
            ];
            Media::create($media);

            // TAGS
            TagPost::where('post_id',$id)->delete();
            $tags = explode(',',$request->tags);
            foreach( $tags as $item ){
                $tag = Tag::firstOrCreate(['name' => $item]);
                $tagPost = [
                    "post_id" => $id,
                    "tag_id" => $tag->id
                ];
                $tagPost = TagPost::create($tagPost);
            }
            DB::commit();
        
            return redirect('administrator/management/post')->with('success','Good Job!');
        }catch(\Exception $e){
            DB::rollback();
            return redirect('administrator/management/post/'.$id.'/edit')->with('error','Something Went Wrong!');
        }
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

        PostMeta::where('post_id',$id)->delete();

        Media::where('fk',$id)->delete();

        TagPost::where('post_id',$id)->delete();

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
                    $editButton = '<a class="btn btn-icon waves-effect btn-warning waves-light show-data" href="'.url('administrator/management/post/'.$row->id.'/edit').'"> <i class="fa fa-edit"></i> </a>';
                    $deleteButton = '<button class="btn btn-icon waves-effect btn-danger waves-light del-data" data="'.$row->id.'"> <i class="fa fa-trash-o"></i> </button>';
                    return $editButton.' &nbsp; '.$deleteButton;            
                })
                ->rawColumns(['action','status'])
                ->make(true);
    }

    public function categories()
    {
        $categories = Category::select('id','name','parent_id')->whereNull('parent_id')->with('childrenCategories:id,name,parent_id')->get();
        
        return response()->json($categories);
    }

}
