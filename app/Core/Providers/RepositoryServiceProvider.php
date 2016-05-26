<?php

namespace OneStop\Core\Providers;

use Illuminate\Support\ServiceProvider;
use OneStop\Core\Repositories\Users\Eloquent\UserRepository;
use OneStop\Core\Contracts\Repositories\UserRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);


    }
}
