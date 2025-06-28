<?php

namespace App\Providers;

use App\Repo\EmpRepo;
use App\Repo\EmpRepoImpl;

use App\Repo\StudentRepo;
use App\Repo\StudentRepoImpl;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //Implementation of EmpRepo is in class EmpRepoImpl
        $this->app->bind(EmpRepo::class, EmpRepoImpl::class);

        $this->app->bind(StudentRepo::class, StudentRepoImpl::class);

    }
}
