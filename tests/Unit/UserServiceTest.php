<?php
namespace Tests\Unit;

use App\Domain\Repositories\UserRepositoryInterface;
use App\Domain\Services\UserService;
use App\Infrastructure\Eloquents\User;
use App\Infrastructure\Repositories\UserRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;
use Log;

class UserServiceTest extends TestCase
{
//    use DatabaseMigrations;

    /** @var UserService */
    protected $service;

    public function setUp()
    {
        parent::setUp();
        $this->registerTestLogger();
        $this->service = new UserService(new UserRepository(new User()));

        // スタブを使う場合
//        $this->service = new UserService(new StubUserRepository());
    }

    public function testUserRegister()
    {
        factory(User::class, 30)->create();

        $users = $this->service->find([
            'name' => 'M'
        ]);
//        print_r($users);
        $this->assertNotEmpty($users);
    }
}


// スタブを使う場合
//class StubUserRepository implements UserRepositoryInterface
//{
//    public function findId($query){
//        return factory(\App\Infrastructure\Eloquents\User::class)->make();
//    }
//
//    public function find($query){
//        return factory(\App\Infrastructure\Eloquents\User::class, 10)->make();
//    }
//
//}