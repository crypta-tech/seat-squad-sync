<?php

namespace CryptaEve\Seat\SquadSync;

use Seat\Services\AbstractSeatPlugin;
use CryptaEve\Seat\SquadSync\Console\Synchronise;

class SyncServiceProvider extends AbstractSeatPlugin
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->add_routes();
        $this->add_views();
        $this->add_translations();
        $this->add_commands();
        $this->addMigrations();
    }

    /**
     * Include the routes.
     */
    public function add_routes()
    {
        if (! $this->app->routesAreCached()) {
            include __DIR__ . '/Http/routes.php';
        }
    }

    public function add_translations()
    {
        $this->loadTranslationsFrom(__DIR__ . '/lang', 'squadsync');
    }

    /**
     * Set the path and namespace for the views.
     */
    public function add_views()
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'squadsync');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/Config/sync.config.php', 'squadsync.config');

        $this->mergeConfigFrom(
            __DIR__ . '/Config/sync.sidebar.php',
            'package.sidebar'
        );

        $this->registerPermissions(
            __DIR__ . '/Config/Permissions/sync.permissions.php', 'squadsync');
    }

    private function addMigrations()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations/');
    }

    private function add_commands()
    {
        $this->commands([
                Synchronise::class,
            ]);
    }

    /**
     * Return the plugin public name as it should be displayed into settings.
     *
     * @example SeAT Web
     *
     * @return string
     */
    public function getName(): string
    {
        return 'Squad Sync';
    }


    /**
     * Return the plugin repository address.
     *
     * @example https://github.com/eveseat/web
     *
     * @return string
     */
    public function getPackageRepositoryUrl(): string
    {
        return 'https://github.com/Crypta-Eve/seat-squad-sync';
    }

    /**
     * Return the plugin technical name as published on package manager.
     *
     * @example web
     *
     * @return string
     */
    public function getPackagistPackageName(): string
    {
        return 'seat-squad-sync';
    }

    /**
     * Return the plugin vendor tag as published on package manager.
     *
     * @example eveseat
     *
     * @return string
     */
    public function getPackagistVendorName(): string
    {
        return 'cryptaeve';
    }
}
