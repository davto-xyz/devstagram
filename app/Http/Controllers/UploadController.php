<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class UploadController extends Controller
{
    public function store(Request $request){
        $img = $request->file('file');
        $filename = Str::uuid() . "." . $img->extension();
        
       // create image manager with desired driver
        $manager = new ImageManager(new Driver());
        
        $path = public_path('uploads'). "/".$filename;
        $image = $manager -> read($img);
        $image->save($path);
       
        return $filename;
    }
}
