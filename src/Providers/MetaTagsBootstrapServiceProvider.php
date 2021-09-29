<?php

namespace Fawest\MetaTags\Providers;

use Fawest\MetaTags\Console\InstallCommand;
use Illuminate\Support\ServiceProvider;

class MetaTagsBootstrapServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->registerPublishing();
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            InstallCommand::class,
        ]);
    }

    /**
     * Register the package's publishable resources.
     *
     * @return void
     */
    protected function registerPublishing()
    {
        if (!class_exists('CreateMetaTagsTable')) {
            $timestamp = date('Y_m_d_His', time());
            $this->publishes([
                __DIR__ . '/../../database/migrations/create_meta_tags_table.php.stub' => database_path('migrations/' . $timestamp . '_create_meta_tags_table.php.php'),
            ], 'fawest-meta-tags-migrations');
        }
    }
}
