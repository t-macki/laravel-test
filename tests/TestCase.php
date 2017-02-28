<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;


    protected function registerTestLogger()
    {
        $this->app->bind('log', function ($app) {
            $logger = new \Illuminate\Log\Writer(
                new \Monolog\Logger('testing'), $app['events']
            );
            return $logger;
        });

        $path = base_path('tests/logs/test.log');
        \Log::useFiles($path);
    }

    public function mock($class)
    {
        $mock = \Mockery::mock($class);
        \App::instance($class, $mock);

        return $mock;
    }

    public function setUp()
    {
        parent::setUp();
//        App::setLocale('en');
//        $this->app['config']->set('app.url', 'http://localhost:9515');
//        $this->app['config']->set('database.default', 'mysql');
//        $this->app['config']->set('database.connections.mysql.host', 'localhost');
//        $this->app['config']->set('database.connections.mysql.database', 'laravel_admin');
//        $this->app['config']->set('database.connections.mysql.username', 'root');
//        $this->app['config']->set('database.connections.mysql.password', '');
//        $this->app['config']->set('app.key', 'AckfSECXIvnK5r28GVIWUAxmbBSjTsmF');

        Artisan::call('migrate:refresh');
        Artisan::call('db:seed');
    }

    public function tearDown()
    {
//        Artisan::call('migrate:reset');
    }
}
