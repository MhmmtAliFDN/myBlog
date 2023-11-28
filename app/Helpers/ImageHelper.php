<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class ImageHelper
{
    public static function upload(UploadedFile $image, $name)
    {
        $imageName = $name . '-' . now()->format('YmdHis') . '.webp';
        $image = Image::make($image)->encode('webp', 90)->save(public_path('img\\blog\\'  .  $imageName));
        return $imageName;
    }
}
