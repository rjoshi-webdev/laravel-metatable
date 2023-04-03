<?php

namespace Zoha\Meta\Tests;

use Illuminate\Support\Facades\Schema;

class TestCase extends \Orchestra\Testbench\TestCase
{

    //------------------------------------------ Methods --------------------------------------------//

    /**
     * define package providers
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return ['Zoha\Meta\MetaServiceProvider'];
    }

    protected function getPackageAliases($app)
    {
        return [
            "Meta" => "Zoha\Meta\Facades\MetaFacade",
        ];
    }

    /**
     * define environment configs
     *
     * @param $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'laravelmeta');
        $app['config']->set('database.connections.laravelmeta', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }

    /**
     * setup testing
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->app['config']->set('meta', include(__DIR__ . '/../src/Meta/Config/meta.php'));
        $this->loadLaravelMigrations(['--database' => 'laravelmeta']);
        $this->loadMigrationsFrom(__DIR__ . '/../src/Meta/Database/TestCaseMigrations');
        $this->artisan('migrate', ['--database' => 'laravelmeta']);
    }

    //--------------------------------------- Test Methods -----------------------------------------//

    public function test_connection_and_migrations()
    {
        $tableUsersExists = Schema::hasTable('model');
        $tableMetaExists = Schema::hasTable(config('meta.tables.default', 'meta'));

        $this->assertTrue($tableUsersExists);
        $this->assertTrue($tableMetaExists);
    }
}
