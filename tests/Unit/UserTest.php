<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testFirstName(): void
    {
        $user = new User();
        $user->setNameAttribute('Billy');

        $this->assertEquals($user->name, 'Billy');

        $this->assertInstanceOf(User::class, $user);

        $this->assertClassHasAttribute('name', User::class);
    }
}
