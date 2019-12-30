<?php

namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Support\Facades\File;

/**
 *
 */
trait UploadTrait
{
    public function upload($file, $folder = null, $size=false)
    {
        if (!$file || !$file->isValid()) {
            return;
        }   

        $file_name = md5($file->getClientOriginalName().microtime()).'.'.$file->getClientOriginalExtension();

        if( $size==true ){
            // returns Intervention\Image\Image
            $resize = Image::make($file)->resize(700,465);
            // calculate md5 hash of encoded image
            $hash = md5($resize->__toString());
            // use hash as a name
            $path = "images\{$hash}.{$file->getClientOriginalExtension()}";
            // save it locally to ~/public/images/{$hash}.jpg
            $resize->save(public_path($path));
            Storage::disk('uploads')->put($folder.'/'.$file_name, $resize->__toString());
            //destroy
            $resize->destroy();
            unlink($path);
            return $folder.'/'.$file_name;
        }

        return Storage::disk('uploads')->putFileAs($folder, $file, $file_name);
    }

    public function uploadAvatar($file, $folder = null, array $size)
    {
        if (!$file || !$file->isValid()) {
            return;
        }

        $path = env('UPLOAD_PATH').'/'.$folder;

        if(!File::isDirectory($path)) {
            File::makeDirectory($path, 0755, true);
        }

        $image = Image::make($file);

        $image->resize($size[0], $size[1]);

        $file_name = md5($file->getClientOriginalName().microtime()).'.'.$file->getClientOriginalExtension();

        $image->save(env('UPLOAD_PATH').'/'.$folder.'/'.$file_name);

        $saved_image_uri = $folder.'/'.$image->basename;

        return $saved_image_uri;
    }
}


// // usage inside a laravel route
// Route::get('/', function()
// {
//     $img = Image::make('foo.jpg')->resize(300, 200);

//     return $img->response('jpg');
// });

// // open an image file
// $img = Image::make('public/foo.jpg');

// // resize image instance
// $img->resize(320, 240);

// // insert a watermark
// $img->insert('public/watermark.png');

// // save image in desired format
// $img->save('public/bar.jpg');
?>