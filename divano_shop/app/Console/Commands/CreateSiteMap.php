<?php

namespace App\Console\Commands;

use DB;
use App\Blog;
use App\Gallery;
use App\Product;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\App;

class CreateSiteMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:create';

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
     * @return int
     */
    public function handle()
    {
        //create new sitemap object
        $sitemap = App::make("sitemap");

        //add items to the sitemap (url, date, priority, freq)
        $sitemap->add(route('home.index'), Carbon::now(), '1.0', 'daily');

        //get all posts from db
        $products = Product::orderBy('created_at', 'desc')->get();
        $blogs = Blog::orderBy('created_at', 'desc')->get();


        foreach ($blogs as $blog)
        {
            $images = array();
            $images[] = array(
                'url' => asset('uploads/blog/'.$blog->blog_image)
            );
            $sitemap->add(route('blog.show', [Str::slug($blog->blog_title), 'blog' => $blog->blog_id]), $blog->updated_at, 1, 'daily',$images);
        }

        foreach ($products as $product) {
			$gallery = Gallery::where('pro_id',$product->product_id)->get();
            $images = array();
            if(count($gallery) > 0){
                foreach($gallery as $gall){
                    $images[] = array(
                        'url' => asset('uploads/gallery/'.$gall->gallery_image)
                    );
                }
            }else{
                $images[] = array(
                    'url' => asset('uploads/product/'.$product->product_image)
                );
            }


			$sitemap->add(route('product.show', $product->product_slug), $product->updated_at, 1, 'daily', $images);
		}


        //generate your sitemap (format, filename)
        $sitemap->store('xml', 'sitemap');
    }
}
