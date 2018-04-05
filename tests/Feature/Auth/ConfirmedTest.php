<?php

namespace Tests\Feature\Auth;

use App\Http\Middleware\Confirmed;
use App\User;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class ConfirmedTest extends TestCase
{

    public function setUp()
    {
        parent::setUp();

        Route::get('/register/confirm', function () {})->middleware(Confirmed::class);
    }

    /** @test */
    public function an_unauthenticated_user_should_receive_401_status()
    {
        $this->assertNull(auth()->user());

        $this->get('/register/confirm')->assertStatus(401);
    }

    /** @test */
    public function a_not_confirmed_user_should_receive_401_status()
    {
        $this->actingAs(factory(User::class)->create());

        $this->assertNotNull(auth()->user());

        $this->get('/register/confirm')->assertStatus(401);
    }

    /** @test */
    public function confirmed_user_should_recieve_200_status()
    {
        $this->actingAs(factory(User::class)->create(['verified' => 1]));

        $this->assertNotNull(auth()->user());

        $this->get('/register/confirm')->assertStatus(200);
    }
}
