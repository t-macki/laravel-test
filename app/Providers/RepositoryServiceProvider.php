<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            \App\Domain\Repositories\UserRepositoryInterface::class,
            \App\Infrastructure\Repositories\UserRepository::class
        );
        $this->app->bind(
            \App\Domain\Repositories\CommentRepositoryInterface::class,
            \App\Infrastructure\Repositories\CommentRepository::class
        );
        $this->app->bind(
            \App\Domain\Repositories\EntryRepositoryInterface::class,
            \App\Infrastructure\Repositories\EntryRepository::class
        );
    }
}
