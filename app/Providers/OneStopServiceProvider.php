<?php

namespace OneStop\Providers;

use Illuminate\Support\ServiceProvider;
use OneStop\Core\Repositories\Users\Eloquent\UserRepository;
use OneStop\Core\Repositories\Videos\Eloquent\VideoRepository;
use OneStop\Core\Repositories\VideoCategories\Eloquent\VideoCategoryRepository;
use OneStop\Core\Contracts\Repositories\UserRepositoryInterface as UserRepositoryContract;
use OneStop\Core\Contracts\Repositories\VideoRepositoryInterface as VideoRepositoryContract;
use OneStop\Core\Contracts\Repositories\VideoCategoryRepositoryInterface as VideoCategoryRepositoryContract;

class OneStopServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->defineServices();
    }


    protected function defineServices()
    {
    	$services = [
    		UserRepositoryContract::class => UserRepository::class,
    		VideoCategoryRepositoryContract::class => VideoCategoryRepository::class,
    		VideoRepositoryContract::class => VideoRepository::class,
    	];

    	foreach ($services as $key => $service) {
    		$this->app->bindIf($key,$service);
    	}

    }
}
