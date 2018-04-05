<?php

namespace Tests\Feature\Auth;

use App\Mail\VerificationEmail;
use App\User;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class RegistrationTest extends TestCase
{

    /** @test */
    public function it_should_send_verification_message()
    {
        Mail::fake();

        $this->createUser();

        Mail::assertSent(VerificationEmail::class);
    }

    public function  createUser(){
        $data = factory(User::class)->make()->getAttributes();
        $data['password_confirmation'] = $data['password'];

        return $this->post(route('register'), $data);
    }
}
