<?php

namespace App\Providers;

use App\Repositories\Read\Post\PostReadRepository;
use App\Repositories\Read\Post\PostReadRepositoryInterface;
use App\Repositories\Write\Post\PostWriteRepository;
use App\Repositories\Write\Post\PostWriteRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            PostReadRepositoryInterface::class,
            PostReadRepository::class,
        );

        $this->app->bind(
            PostWriteRepositoryInterface::class,
            PostWriteRepository::class,
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
