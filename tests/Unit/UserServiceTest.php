<?php
namespace Tests\Unit;

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