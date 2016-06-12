<?php

namespace OneStop\Core\Providers;

use Illuminate\Support\ServiceProvider;
use OneStop\Core\Repositories\Users\Eloquent\UserRepository;
use OneStop\Core\Contracts\Repositories\UserRepositoryInterface;
use OneStop\Core\Repositories\VideoCategories\Eloquent\VideoCategoryRepository;
use OneStop\Core\Contracts\Repositories\VideoCategoryRepositoryInterface;

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

        $this->videos();
    }


    /**
     *
     * @return [type] [description]
     */
    private function videos()
    {
    	$this->app->bind(VideoCategoryRepositoryInterface::class,VideoCategoryRepository::class);
    }
}
