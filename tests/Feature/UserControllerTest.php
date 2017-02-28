<?php

namespace Tests\Feature;

use App\Infrastructure\Eloquents\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserControllerTest extends TestCase
{
//    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();
        $this->registerTestLogger();

        // artisanコマンドの実行
//        \Artisan::call('migrate:refresh');
//        \Artisan::call('db:seed');


        // 呼び出されるRepositoriesとかをスタブに置き換える場合
//        $this->app->bind(
//            \App\Repositories\EntryRepositoryInterface::class,
//            \StubCommentEntryRepository::class
//        );

//        $this->be(Administrator::first(), 'admin');

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
 ファイル添付テスト
    public function testCanEditUserAvatar()
    {
        $path = __DIR__.'/assets/test.jpg';

        $file = new \Illuminate\Http\UploadedFile(
            $path, 'test.jpg', 'image/jpeg', filesize($path), null, true
        );

        $size = rand(10, 20);
        $files = ['pictures' => array_pad([], $size, $file)];

        $this->call(
            'POST', // $method
            '/admin/multiple-images', // $action
            [], // $parameters
            [],
            $files
        );

        $this->assertResponseStatus(302);


or


        File::cleanDirectory(public_path('upload/image'));

        $this->visit('admin/auth/setting')
            ->attach(__DIR__.'/assets/test.jpg', 'avatar')
            ->press('Submit')
            ->seePageIs('admin/auth/setting');

or

        $this->visit(route('voyager.profile'))
            ->click('Edit My Profile')
            ->see('Edit User')
            ->seePageIs(route('voyager.users.edit', ['user' => $this->user->id]))
            ->attach($this->newImagePath(), 'avatar')
            ->press('Submit')
            ->seePageIs(route('voyager.users.index'))
            ->dontSeeInDatabase(
                'users',
                ['id' => 1, 'avatar' => 'user/default.png']
            );
    }

    protected function newImagePath()
    {
        return realpath(__DIR__.'/temp/new_avatar.png');
    }
*/

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
