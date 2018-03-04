<?php
namespace App\Foundation;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

use App\Data\Contracts\UserRepositoryInterface;

use App\Data\Repositories\EloquentUserRepository;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        // Register the service providers of your Services here.
        $this->app->register('App\Services\Api\Providers\ApiServiceProvider');

        // Bind repository contracts to implementations here.
        $this->app->bind(UserRepositoryInterface::class, function () {
            return new EloquentUserRepository();
        });

    }
}
