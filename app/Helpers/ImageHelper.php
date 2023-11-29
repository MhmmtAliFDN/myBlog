<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image;

class ImageHelper
{
    public static function upload(UploadedFile $image, $name, $page)
    {
        $imageName = $name . '-' . now()->format('dmY') . '.webp';
        $image = Image::make($image)->encode('webp', 90)->save(public_path('img\\'.$page.'\\'  .  $imageName));
        return $imageName;
    }

    public static function delete($image, $page)
    {
        $path = public_path('img\\'.$page.'\\'.$image);

        if ($path) unlink($path);
    }
}
