<?php
namespace Tests\Repositories;

use App\Infrastructure\Eloquents\User;
use Tests\TestCase;
use Mockery;

class UserRepositoryTest extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        $this->registerTestLogger();
    }

    public function testUserfind()
    {
        $userAliasMock = Mockery::mock(new User());

        $user = factory(\App\Infrastructure\Eloquents\User::class)->make([
            'id'=>'1341002'
        ]);

        $userAliasMock->shouldReceive('findId')->andReturn($user);
        $repository = new \App\Infrastructure\Repositories\UserRepository(
            $userAliasMock
        );

        $result = $repository->findId([
            'id' => '1341002'
        ]);

        $this->assertNotEmpty($result);
    }

}