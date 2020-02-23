<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Model\Post;

class GeneralComposer
{
    /**
     * The user repository implementation.
     */
    protected $post;

    /**
     * Create a new profile composer.
     */
    public function __construct(Post $post)
    {
        // Dependencies automatically resolved by service container...
        $this->post = $post;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $data = $this->post->with(['meta'])->where('post_type','general')->first();

        $general = [];

        if($data !== null){
            
            $content = json_decode($data->post_content);
        
            $general = [
                "name" => $data->post_title,
                "slug" => $data->post_slug,
                "tagline" => $content->tagline,
                "sub_tagline" => $content->sub_tagline,
                "about_us" => $content->about_us,
                "facebook" => $content->facebook,
                "twitter" => $content->twitter,
                "instagram" => $content->instagram,
                "meta_title" => $data->meta[0]->meta_value,
                "meta_description" => $data->meta[1]->meta_value,
                "meta_image" => $data->meta[2]->meta_value,
            ];
        }

        $view->with('general', $general);
    }
}