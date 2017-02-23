<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

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
}
