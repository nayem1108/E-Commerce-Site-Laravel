<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;

    private static $subcategory;
    private static $imageName;
    private static $imageURL;
    private static $directory;

    //private functions

    private static function getImageURL($image)
    {
        self::$imageName = $image->getClientOriginalName();
        self::$directory = 'subcategory images/';
        $image->move(self::$directory, self::$imageName);
        self::$imageURL = self::$directory.self::$imageName;

        return self::$imageURL;
    }

    private static function uploadImage($newImage, $oldImage){
        if($newImage)
        {
            if(file_exists($oldImage))
                unlink($oldImage);

            return self::getImageURL($newImage);
        }

        return $oldImage;
    }

    public static function createSubcategory($request)
    {
        self::$subcategory = new Subcategory();

        self::$subcategory->name = $request->name;
        self::$subcategory->category_id = $request->category_id;
        self::$subcategory->description = $request->description;
        if($request->file('image'))
        {
            self::$subcategory->image = self::getImageURL($request->file('image'));
        }
        else{
            self::$subcategory->image = '';
        }
        self::$subcategory->status = $request->status;
        self::$subcategory->save();
    }

    public static function updateSubcategory($request, $id)
    {
        self::$subcategory = Subcategory::find($id);
        
        self::$subcategory->category_id = $request->category_id;
        self::$subcategory->name = $request->subcategory_name;
        self::$subcategory->description = $request->description;
        self::$subcategory->status = $request->status;

        self::$imageURL  = self::uploadImage($request->file('image'), self::$subcategory->image);
        self::$subcategory->image = self::$imageURL;

        self::$subcategory->save();
    }


    public static function deleteSubcategory($id)
    {
        self::$subcategory = Subcategory::find($id);

        if(file_exists(self::$subcategory->image))
        {
            unlink(self::$subcategory->image);
        }
        
        self::$subcategory->delete();
    }


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function allProducts()
    {
        return $this->hasMany(Product::class);
    }

}