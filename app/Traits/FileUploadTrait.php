<?php
namespace App\Traits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
 
trait FileUploadTrait {

    public function fileUpload( Request $request, $fieldname = 'unknown', $directory = 'unknown' ){
        if($request->hasFile($fieldname)){

            if (!$request->file($fieldname)->isValid()) {
                flash('Invalid File!')->error()->important();
                return redirect()->back()->withInput();
            }

       
         $file = $request->file($fieldname);
         // Save the file
         // dist select
          $disk = Storage::disk(config('filesystems.default'));
         
          // here name set 
          $name = md5(time()).".".$file->getClientOriginalExtension();
          //file storage path
          $name_new =$directory."/".$name;
                
          $disk->put($name_new,file_get_contents($file));
          return $name;
        }

    }

}