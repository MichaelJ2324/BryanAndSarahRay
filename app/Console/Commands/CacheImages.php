<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CacheImages extends Command
{

    protected $cacheStore = 'gallery';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Site:cacheImages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
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
        \Cache::forget($this->cacheStore);
        $galleryPhotos = \Config::get('site.gallery');
        $this->info(print_r($galleryPhotos,true));
        $keys = array_keys($galleryPhotos);

        shuffle($keys);
        $cacheContent = '';
        $c = 0;
        $count = count($galleryPhotos);
        while($c<$count){
            $photo = $keys[$c];
            $caption = $galleryPhotos[$keys[$c]];
            $from = base_path("resources/assets/images/gallery/$photo.jpg");
            $to = base_path("public/images/gallery/img$c.jpg");
            $public = "images/gallery/img$c.jpg";
            if (\File::exists($from)) {
                if (\File::exists($to)) {
                    $this->info("Removing $to");
                    \File::delete($to);
                }
                $this->info("Copying file $from to $to");
                \File::copy($from, $to);
                $cacheContent .= "<article>
                                    <a href='" . asset($public) . "' class='image'>
                                        <img src='$public' alt='' />
                                    </a>
                                    <div class='caption'>$caption</div>
                                   </article>";
            }
            $c++;
        }
        $this->info($cacheContent);
        \Cache::forever($this->cacheStore,$cacheContent);
    }
}
