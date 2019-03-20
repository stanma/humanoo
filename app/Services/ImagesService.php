<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;

/**
 * Created by PhpStorm.
 * User: Stan
 * Date: 3/20/2019
 * Time: 3:50 AM
 */
class ImagesService
{
    /**
     * @return static
     */
    public function get()
    {
        $images = collect(Storage::files('/public/kittens'))
            ->sortByDesc(function ($file) {
                Storage::lastModified($file);
            })
            ->take(5);

        $list = [];

        $list['data'] = $images;

        return $list;
    }
}