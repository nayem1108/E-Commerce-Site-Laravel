<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    private static $brand;
    private static $imageName;
    private static $directory;
    private static $imangeURL;


    private static function getImageURL($image){
        self::$imageName = $image->getClientOriginalName();
        self::$directory = 'brand images/';
        $image->move(self::$directory, self::$imageName);
        self::$imangeURL = self::$directory.self::$imageName;

        return self::$imangeURL;
    }

    public static function addBrand($request)
    {
        self::$brand = new Brand();
        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        self::$brand->status = $request->status;
        if($request->file('image')){
            self::$brand->image = self::getImageURL($request->file('image'));
        }
        else{
            self::$brand->image =  '';
        }
        self::$brand->save();
    }

    public static function updateInfo($request, $id)
    {
        self::$brand = Brand::find($id);

        if($request->file('image'))
        {
            if(file_exists(self::$brand->image))
            {
                unlink(self::$brand->image);
            }
            self::$imangeURL = self::getImageURL($request->file('image'));
        }
        else{
            self::$imangeURL = self::$brand->image;
        }
        self::$brand->name = $request->name;
        self::$brand->description = $request->description;
        self::$brand->image = self::$imangeURL;
        self::$brand->status = $request->status;
        self::$brand->save();
    }

    public static function deleteBrand($id)
    {
        self::$brand = Brand::find($id);
        if(file_exists(self::$brand->image))
        {
            unlink(self::$brand->image);
        }

        self::$brand->delete();
    }


    public function allProducts()
    {
        return $this->hasMany(Product::class);
    }
}
