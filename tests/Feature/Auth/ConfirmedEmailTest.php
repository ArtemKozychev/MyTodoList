<?php

namespace Tests\Feature\Auth;

use App\Mail\VerificationEmail;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;
class ConfirmedEmailTest extends TestCase
{
    use RefreshDatabase;

//    /** @test */
    public function it_should_confirm_a_user()
    {
        Mail::fake();

        $this->createUser();

        Mail::assertSent(VerificationEmail::class, function (VerificationEmail $mail) {
            $url = $mail->getTemporarySignedRoute();

            $this->get($url)->assertStatus(200);

            $this->assertTrue($mail->user->fresh()->verified);

            return true;
        });
    }

    /** @test */
    public function it_should_receive_404_status_if_a_user_already_confirmed()
    {
        Mail::fake();

        $this->createUser();

        Mail::assertSent(VerificationEmail::class, function (VerificationEmail $mail) {
            $url = $mail->getTemporarySignedRoute();

            $mail->user->confirm();

            $this->get($url)->assertStatus(404);

            return true;
        });
    }

    /** @test */
    public function it_should_receive_403_status_if_a_link_is_expired()
    {
        Mail::fake();

        $this->createUser();

        Mail::assertSent(VerificationEmail::class, function (VerificationEmail $mail) {
            $url = $mail->getTemporarySignedRoute();

            Carbon::setTestNow(now()->addDays(2));

            $this->get($url)->assertStatus(401);

            return true;
        });
    }

    public function  createUser(){
        $data = factory(User::class)->make()->getAttributes();
        $data['password_confirmation'] = $data['password'];

        return $this->post(route('register'), $data);
    }
}
