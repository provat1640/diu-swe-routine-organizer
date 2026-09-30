<?php

namespace App\Providers;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
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
        if ($this->app->environment('production') || str_starts_with((string) config('app.url'), 'https://')) {
            URL::forceScheme('https');
        }

        // 1. Ensure storage framework directories exist and have fallback to /tmp if read-only
        $viewCompiled = storage_path('framework/views');
        if (! is_dir($viewCompiled)) {
            @mkdir($viewCompiled, 0777, true);
        }
        @chmod($viewCompiled, 0777);
        if (! is_writable($viewCompiled)) {
            $tmpViewDir = sys_get_temp_dir().DIRECTORY_SEPARATOR.'views';
            if (! is_dir($tmpViewDir)) {
                @mkdir($tmpViewDir, 0777, true);
            }
            Config::set('view.compiled', $tmpViewDir);
        }

        $sessionsDir = storage_path('framework/sessions');
        if (! is_dir($sessionsDir)) {
            @mkdir($sessionsDir, 0777, true);
        }
        @chmod($sessionsDir, 0777);
        if (! is_writable($sessionsDir)) {
            $tmpSessionsDir = sys_get_temp_dir().DIRECTORY_SEPARATOR.'sessions';
            if (! is_dir($tmpSessionsDir)) {
                @mkdir($tmpSessionsDir, 0777, true);
            }
            Config::set('session.files', $tmpSessionsDir);
        }

        // 2. Ensure SQLite database file is accessible and writable (fallback to /tmp if CIFS/mount issues)
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

        $tmpDb = sys_get_temp_dir().DIRECTORY_SEPARATOR.'database.sqlite';
        if ((! is_writable($dbDir) || ! is_writable($dbPath)) && file_exists($dbPath)) {
            if (! file_exists($tmpDb) || filesize($tmpDb) === 0) {
                @copy($dbPath, $tmpDb);
                @chmod($tmpDb, 0666);
            }
            if (file_exists($tmpDb)) {
                Config::set('database.connections.sqlite.database', $tmpDb);
                DB::purge('sqlite');
            }
        }

        // 3. Auto-migrate and seed if tables are missing or empty
        try {
            if (! Schema::hasTable('course_offerings') || ! Schema::hasTable('academic_routines')) {
                Artisan::call('migrate', ['--force' => true]);
            }
            if (Schema::hasTable('academic_routines') && DB::table('academic_routines')->count() === 0) {
                Artisan::call('db:seed', ['--force' => true]);
            }
        } catch (\Throwable $e) {
            Log::error('Database auto-initialization error: '.$e->getMessage());
        }
    }
}
