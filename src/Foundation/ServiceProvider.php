<?php
namespace App\Foundation;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

use App\Data\Contracts\UserRepositoryInterface;
use App\Data\Contracts\ProfileRepositoryInterface;
use App\Data\Contracts\TeamRepositoryInterface;
use App\Data\Contracts\CompetitionRepositoryInterface;
use App\Data\Contracts\LeaderboardRepositoryInterface;

use App\Data\Repositories\EloquentUserRepository;
use App\Data\Repositories\EloquentProfileRepository;
use App\Data\Repositories\EloquentTeamRepository;
use App\Data\Repositories\EloquentCompetitionRepository;
use App\Data\Repositories\EloquentLeaderboardRepository;

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
        $this->app->bind(ProfileRepositoryInterface::class, function () {
            return new EloquentProfileRepository();
        });
        $this->app->bind(TeamRepositoryInterface::class, function () {
            return new EloquentTeamRepository();
        });
        $this->app->bind(CompetitionRepositoryInterface::class, function () {
            return new EloquentCompetitionRepository();
        });
        $this->app->bind(LeaderboardRepositoryInterface::class, function () {
            return new EloquentLeaderboardRepository();
        });
    }
}
