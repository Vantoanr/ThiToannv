<?php

namespace App\Models;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StoreFile
{
    public static $path = "public/Customer/";
    public static $publicPath = "/storage/Customer/";
    public static function StoreFile($file){

        if(!Storage::disk('local')->exists(StoreFile::$path)){
            Storage::makeDirectory(StoreFile::$path);
        }
        $extension = $file->extension();
        $fileName = Str::uuid()->toString().".".$extension;
        $file->storeAs(StoreFile::$path, $fileName, 'local');
        return $fileName;
    }
}
