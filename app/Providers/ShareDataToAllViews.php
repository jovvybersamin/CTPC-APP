<?php

namespace OneStop\Providers;

use Illuminate\Support\ServiceProvider;
use OneStop\Core\Repositories\VideoCategories\Eloquent\VideoCategoryRepository;

class ShareDataToAllViews extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
       view()->share('app_title','Ctpc.tv');

       view()->composer(
            'site.layout','OneStop\Http\ViewComposers\CategoriesComposer'
        );

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
