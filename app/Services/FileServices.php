<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

class FileServices
{
    static function imgStore($file)
    {
        $url = null;

        if ($file) {
            $path = Storage::putFile('public/img', $file);
            $url = Storage::url($path);
        }

        return $url;
    }
}
