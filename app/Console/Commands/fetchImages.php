<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

/**
 * Class fetchImages
 * @package App\Console\Commands
 */
class FetchImages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'images:fetch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'fetches images from https://cataas.com/cat/cute';

    /**
     * FetchImages constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Storage::put('public/kittens/'.uniqid('image'), file_get_contents('https://cataas.com/cat/cute'));
    }
}
