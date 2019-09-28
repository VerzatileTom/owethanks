<?php

namespace Tests\Feature;

use App\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class UploadPhotoTest extends TestCase
{
    /** @test */
    public function a_user_can_upload_a_photo_to_get_verified()
    {
        Storage::fake();
        $this->withoutExceptionHandling();

        // Given
        $user = factory(User::class)->create(['verified' => false]);
        $this->actingAs($user);
        $photo = UploadedFile::fake()->image('avatar.jpg');

        // When
        $response = $this->patch('/verify', ['photo' => $photo]);

        // Then
        $response->assertRedirect('/home');
        tap($user->fresh(), function ($user) {
           $this->assertEquals(1, $user->verified);
        });
    }
}
