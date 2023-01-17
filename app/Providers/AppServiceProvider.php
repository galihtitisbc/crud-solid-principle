<?php

namespace App\Providers;

use App\Modules\Post\Repository\PostRepository;
use App\Modules\Post\Repository\PostRepositoryImpl;
use App\Modules\Post\Service\PostService;
use App\Modules\Post\Service\PostServiceImpl;
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
        $this->app->bind(PostService::class, PostServiceImpl::class);
        $this->app->bind(PostRepository::class, PostRepositoryImpl::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
