<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    /** @test */
    public function a_user_can_go_to_registration_form()
    {
        $this->get('/register')
            ->assertSeeText('Register');
    }

    /** @test */
    public function a_user_can_register_as_lender()
    {
        $this->withoutExceptionHandling();

        // Given
        $user = factory(User::class)->raw([
            'name' => 'John Doe',
            'email' => 'johndoe@lender.com',
            'password' => 'secret123',
            'password_confirmation' => 'secret123',
            'role' => 'Lender'
        ]);

        // When
        $response = $this->post('/register', $user);

        // Then
        $response->assertRedirect('/home');
        $this->assertAuthenticated();
    }
}
