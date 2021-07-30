<?php 

namespace App\Helps;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;

class UploadHelper{

    const MAX_SIZE = 1024;

    /**
     * Upload image with resize
     *
     * @param $file - Example: $file = $request->file('image')
     * @param null $folder - Example: avatars or images
     *
     * @return string
     */
    public static function uploadPhotoWithResize($file, $folder = null): string
    {
        // Resize
        $image = Image::make($file->getRealPath())->resize(self::MAX_SIZE, self::MAX_SIZE, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->stream();

        $path = "/uploads" . ($folder ? "/$folder" : "");
        $filename = Str::uuid() . '.' . ($file->getClientOriginalExtension() ?? 'png');

        Storage::disk(config('filesystems.default'))->put($path . "/" . $filename, $image->__toString(), ['visibility' => 'public']);
        return ltrim($path . "/" . $filename, "/");
    }

     /**
     * Delete file
     *
     * @param $path
     *
     * @return bool
     */
    public static function delete($path): bool
    {
        return Storage::delete($path);
    }

    /**
     * Get Public asset url
     *
     * @param $path
     * @return string
     */
    public static function getPublicAsset($path): string
    {
        return asset(Storage::disk(config('filesystems.default'))->url($path));
    }



}

?>