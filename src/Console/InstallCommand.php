<?php

namespace Fawest\MetaTags\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Str;

class InstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fawest:install-meta-tags';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install all of the MetaTags package resources';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->comment('Publishing migration...');
        $this->callSilent('vendor:publish', ['--tag' => 'fawest-meta-tags-migrations']);

        $this->comment('Publishing butschster/meta-tags...');
        $this->call('meta-tags:install');
    }
}
