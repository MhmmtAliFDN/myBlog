<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ImageHelper
{
    public static function upload(UploadedFile $image, $name, $page)
    {
        $imageName = $name . '.webp';
        $image = Image::make($image)->encode('webp', 90);

        $date = now()->format('m-Y');
        $directoryPath = public_path('img' . DIRECTORY_SEPARATOR . $page . DIRECTORY_SEPARATOR . $date);

        if (!is_dir($directoryPath)) File::makeDirectory($directoryPath, 0755, true);
        $image->save(public_path('img' . DIRECTORY_SEPARATOR . $page . DIRECTORY_SEPARATOR . $date . DIRECTORY_SEPARATOR . $imageName));

        $imagePath = "img/{$page}/{$date}/{$imageName}";

        return $imagePath;
    }

    public static function delete($image, $page)
    {
        $parts = explode('/', $image);
        $directory = public_path('img' . DIRECTORY_SEPARATOR . $page . DIRECTORY_SEPARATOR . $parts[2]);
        $path = public_path($image);
        if (File::exists($path)) {
            unlink($path);

            if (File::isEmptyDirectory($directory)) {
                File::deleteDirectory($directory);
            }
        }
    }

    public static function update(UploadedFile $image, $name, $page, $oldImage)
    {
        ImageHelper::delete($oldImage, $page);
        $imageName = ImageHelper::upload($image, $name, $page);

        return $imageName;
    }
}
