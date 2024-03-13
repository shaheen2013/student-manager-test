<?php

namespace App\Providers;

use App\Domain\Services\StudentServiceInterface;
use App\Domain\Services\StudentService;
use Illuminate\Support\ServiceProvider;
use App\Domain\Repositories\EloquentStudentRepository;
use App\Domain\Repositories\StudentRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        //Repo
        $this->app->bind(StudentRepositoryInterface::class , function($app) {
            return $app->make(EloquentStudentRepository::class);
        });
        //Service
        $this->app->bind(StudentServiceInterface::class , function($app) {
            return $app->make(StudentService::class);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
