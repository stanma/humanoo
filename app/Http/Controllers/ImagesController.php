<?php
/**
 * Created by PhpStorm.
 * User: Stan
 * Date: 3/20/2019
 * Time: 3:47 AM
 */

namespace App\Http\Controllers;

use App\Services\ImagesService;

/**
 * Class ImagesController
 * @package App\Http\Controllers
 */
class ImagesController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        $service = new ImagesService();
        $images = $service->get();
        
        return json_encode($images);
    }
}