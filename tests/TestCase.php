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

    public function setUp()
    {
        parent::setUp();
//        App::setLocale('en');
//        config(['database.connections.testing.database' => 'homesteadtest']);

        Artisan::call('migrate:refresh');
        Artisan::call('db:seed');
    }

    public function tearDown()
    {
//        Artisan::call('migrate:reset');
    }
}
