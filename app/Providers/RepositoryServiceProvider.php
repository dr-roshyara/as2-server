<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use AS2\PartnerRepositoryInterface;
use AS2\MessageRepositoryInterface;
use App\Repositories\AsMessageRepository;
use App\Repositories\AsPartnerRepository;
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(MessageRepositoryInterface::class, AsMessageRepository::class);
        $this->app->bind(PartnerRepositoryInterface::class, AsPartnerRepository::class);
 
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
