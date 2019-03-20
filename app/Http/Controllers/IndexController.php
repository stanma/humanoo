<?php
/**
 * Created by PhpStorm.
 * User: Stan
 * Date: 3/20/2019
 * Time: 3:59 AM
 */

namespace App\Http\Controllers;

use GuzzleHttp;

/**
 * Class IndexController
 * @package App\Http\Controllers
 */
class IndexController extends Controller
{
    /**
     * @return mixed
     */
    public function index()
    {
        return view('welcome');
    }
}