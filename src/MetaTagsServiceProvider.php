<?php

namespace Fawest\MetaTags;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\ServiceProvider;

class MetaTagsServiceProvider extends ServiceProvider
{
    public function boot()
    {
//        php artisan vendor:publish --provider="Fawest\MetaTags\MetaTagsServiceProvider" --tag="migrations"
        if ($this->app->runningInConsole()) {
            if (! class_exists('CreateMetaTagsTable')) {
                $timestamp = date('Y_m_d_His', time());
                $this->publishes([
                    __DIR__.'/../database/migrations/create_meta_tags_table.php.stub' => database_path('migrations/'.$timestamp.'_create_meta_tags_table.php.php'),
                ], 'migrations');
            }
        }
    }
}
