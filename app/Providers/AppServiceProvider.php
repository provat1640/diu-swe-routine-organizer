<?php

namespace App\Providers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $dbPath = database_path('database.sqlite');
        $dbDir = dirname($dbPath);

        if (! is_dir($dbDir)) {
            @mkdir($dbDir, 0777, true);
        }
        if (! file_exists($dbPath)) {
            @touch($dbPath);
        }
        @chmod($dbDir, 0777);
        @chmod($dbPath, 0777);

        try {
            if (! Schema::hasTable('academic_routines')) {
                Artisan::call('migrate', ['--force' => true]);
                Artisan::call('db:seed', ['--force' => true]);
            }
        } catch (\Throwable $e) {
            Log::error('Database auto-initialization error: '.$e->getMessage());
        }
    }
}
