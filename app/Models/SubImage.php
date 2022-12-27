<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubImage extends Model
{
    use HasFactory;
    private static $subImage;
    private static $subImages;
    private static $imageName;
    private static $directory;
    private static $imageURL;

    private static function getImageURL($image)
    {
        self::$imageName = $image->getClientOriginalName();
        self::$directory = 'product-sub-images/';
        $image->move(self::$directory, self::$imageName);
        self::$imageURL = self::$directory.self::$imageName;
        return self::$imageURL;
    }

    public static function createSubImage($product, $subImages)
    {
        foreach($subImages as $subImage)
        {
            self::$subImage = new SubImage();
            self::$subImage->product_id = $product->id;
            self::$subImage->image = self::getImageURL($subImage);
            self::$subImage->save();
        }
    }


    public static function UpdateSubImage($product, $subImages){
        self::$subImages = SubImage::where('product_id', $product->id)->get();
        foreach (self::$subImages as $subImage) {
            if(file_exists($subImage->image))
            {
                unlink($subImage->image);
            }
            $subImage->delete();
        }
        self::createSubImage($product, $subImages);
    }

    
    public static function deleteSubImage($id)
    {
        self::$subImages = SubImage::where('product_id', $id)->get();
        foreach (self::$subImages as $subImage) 
        {
            if(file_exists($subImage->image))
            {
                unlink($subImage->image);
            }
            $subImage->delete();
        }
    }

}
