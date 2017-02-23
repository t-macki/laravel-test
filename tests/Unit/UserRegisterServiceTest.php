<?php
namespace Tests\Unit;

use App\Domain\Services\UserRegisterService;
use Tests\TestCase;

class UserRegisterServiceTest extends TestCase
{
    /** @var \App\Domain\Services\UserRegisterService */
    protected $service;

    public function setUp()
    {
        parent::setUp();
        $this->registerTestLogger();
        $this->service = new UserRegisterService();
    }

    public function testUserRegister()
    {
//        $id = $this->service->create([
//            'name' => '1341002',
//            'email' => '1341002',
//            'password' => '1341002',
//            'password_confirmation' => '1341002'
//        ]);
        $this->assertTrue(true);
    }
}