<?php

namespace App\Http\Controllers\_Administrator\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Post;
use App\Model\PostMeta;
use App\Model\TagPost;
use Auth;
use DB;

class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::with(['meta'])->where('post_type','general')->first();

        $data = [];

        if($post !== null){
            
            $content = json_decode($post->post_content);
        
            $data = [
                "name" => $post->post_title,
                "slug" => $post->post_slug,
                "tagline" => $content->tagline,
                "sub_tagline" => $content->sub_tagline,
                "about_us" => $content->about_us,
                "facebook" => $content->facebook,
                "twitter" => $content->twitter,
                "instagram" => $content->instagram,
                "meta_title" => $post->meta[0]->meta_value,
                "meta_description" => $post->meta[1]->meta_value,
                "meta_image" => $post->meta[2]->meta_value,
            ];
        }

        return view('_Administrator.settings.general.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post = Post::with(['meta'])->where('post_type','general')->first();

        if( $post !== null ){
            return redirect('administrator/settings/general');
        }

        return view('_Administrator.settings.general.form');
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
            $custom = [
                "tagline" => $request->tagline,
                "sub_tagline" => $request->sub_tagline,
                "about_us" => $request->about_us,
                "facebook" => $request->facebook,
                "twitter" => $request->twitter,
                "instagram" => $request->instagram,
            ];
            $post = [
                "post_author" => Auth::id(),
                "post_title" => $request->name,
                "post_content" => json_encode($custom),
                "post_type" => "general", // post,page,revision,general
                "post_status" => 'publish',
                "comment_status" => 'close',
                "category_id" => 0
            ];
            $res = Post::create($post);
            // META
            $meta = ['title','description','image'];
            $postMeta = [];
            foreach( $meta as $key => $item ){
                $postMeta[] = [
                    "post_id" => $res->id,
                    "meta_key" => $item,
                    "meta_value" => $request->meta[$key] 
                ];
            }
            PostMeta::insert($postMeta);
            DB::commit();
            // Alert::success('Success', 'Good Job!');
            return redirect('administrator/settings/general')->with('success','Good Job!');
        }catch(\Exception $e){
            DB::rollback();
            return redirect('administrator/settings/general/create')->with('error','Something Went Wrong!');
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
        $post = Post::with(['meta'])->where('post_slug',$id)->first();

        $data = [];

        if($post !== null){
            
            $content = json_decode($post->post_content);
        
            $data = [
                "name" => $post->post_title,
                "slug" => $post->post_slug,
                "tagline" => $content->tagline,
                "sub_tagline" => $content->sub_tagline,
                "about_us" => $content->about_us,
                "facebook" => $content->facebook,
                "twitter" => $content->twitter,
                "instagram" => $content->instagram,
                "meta_title" => $post->meta[0]->meta_value,
                "meta_description" => $post->meta[1]->meta_value,
                "meta_image" => $post->meta[2]->meta_value,
            ];
        }

        return view('_Administrator.settings.general.form',compact('data'));
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
