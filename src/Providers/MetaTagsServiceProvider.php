<?php

namespace Fawest\MetaTags\Providers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

class MetaTagsServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->app->register(MetaTagsBootstrapServiceProvider::class);
        }
    }
}
