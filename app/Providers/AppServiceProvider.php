<?php

namespace App\Providers;

use App\Interface\AuthRepositoryInterface;
use App\Repositories\AuthRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\SchoolRepository;
use App\Services\SchoolService;
use App\Repositories\AdminRepository;
use App\Services\AdminService;
use App\Repositories\StudentRepository;
use App\Services\StudentService;
use App\Repositories\CourseRepository;
use App\Services\CourseService;
use App\Repositories\SectionRepository;
use App\Services\SectionService;
use App\Repositories\LessonRepository;
use App\Services\LessonService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(SchoolRepository::class, function ($app) {
            return new SchoolRepository();
        });

        $this->app->singleton(SchoolService::class, function ($app) {
            return new SchoolService($app->make(SchoolRepository::class));
        });
        $this->app->singleton(AdminRepository::class, function ($app) {
            return new AdminRepository();
        });

        $this->app->singleton(AdminService::class, function ($app) {
            return new AdminService($app->make(AdminRepository::class));
        });
        $this->app->singleton(StudentRepository::class, function ($app) {
            return new StudentRepository();
        });

        $this->app->singleton(StudentService::class, function ($app) {
            return new StudentService($app->make(StudentRepository::class));
        });
        $this->app->singleton(CourseRepository::class, function ($app) {
            return new CourseRepository();
        });

        $this->app->singleton(CourseService::class, function ($app) {
            return new CourseService($app->make(CourseRepository::class));
        });
        $this->app->singleton(SectionRepository::class, function ($app) {
            return new SectionRepository();
        });

        $this->app->singleton(SectionService::class, function ($app) {
            return new SectionService($app->make(SectionRepository::class));
        });
        $this->app->singleton(LessonRepository::class, function ($app) {
            return new LessonRepository();
        });

        $this->app->singleton(LessonService::class, function ($app) {
            return new LessonService($app->make(LessonRepository::class));
        });
        $this->app->bind(AuthRepositoryInterface::class, AuthRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
