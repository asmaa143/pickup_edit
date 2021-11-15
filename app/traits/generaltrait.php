<?php
namespace App\traits;
use Image;
use Illuminate\Support\Facades\File;

Trait generaltrait
{
    public function uploadimage($image,$folder){
         $img = Image::make($image);
         $mime = $img->mime();  
$mim = explode('/', $mime)[1];
$extension = '.' . $mim;
         $name = time().$extension;
         $upload_path = 'uploads/'.$folder;
         $image_url = $upload_path .'/'.$name;
         if (!file_exists(public_path($upload_path))) {
    mkdir(public_path($upload_path), 777, true);
}
         $img->save(public_path($image_url));
         return $image_url;
        } public function deleteimage($path){
            File::delete(public_path().$path);
        }    public function uploadvideo($image,$file){
            $imageName = time(). rand(1,100) . '.' .$image->getClientOriginalExtension();
           $photo = $image->storeAs($file, $imageName, 'uploads'); 
           return 'uploads/' . $photo; 
          } 
}