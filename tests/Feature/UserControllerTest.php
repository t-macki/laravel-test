<?php

namespace Tests\Feature;

use App\Infrastructure\Eloquents\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserControllerTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->registerTestLogger();

        // artisanコマンドの実行
//        \Artisan::call('migrate:refresh');
//        \Artisan::call('db:seed');
    }


    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        factory(User::class, 30)->create();

        $response = $this->call('GET', '/users', ['name' => 'M']);

        $this->assertEquals(200, $response->getStatusCode());

        $ojb = $response->content();
//        print_r($ojb);

        $response->assertStatus($response->status());
    }

/*
    public function testJson()
    {
        //チェック
//        $this->call('GET', '/users', ['name' => 'Mr'])
        $response = $this->get('/users?name=Mr');
        $response->assertStatus(200)->assertJson([
                'message'=>'test',
            ]);


    }
*/
}
