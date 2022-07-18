<?php

namespace App\Providers;

use App\Blog;
use App\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['User.Blog.blog_detail','User.Blog.blog'],function($view){

            $category = Category::where('category_status',1)->get();
            $popular = Blog::orderby('blog_view','desc')->inRandomOrder()->limit(4)->get();

            $view->with(compact('category','popular'));

        });
    }
}
