<?php

namespace Tests\Feature;

use App\Models\Nurse;
use App\Models\RegistrationClass;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class NurseTest extends TestCase
{
    use DatabaseTransactions;

    public function test_nurse_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/nurse/create');

        $response->assertOk();
    }

    public function test_user_can_be_registered_as_nurse(): void
    {
        $user = User::first();
        $registrationClass = RegistrationClass::first();
        $response = $this
            ->actingAs($user)
            ->post('/nurse', [
                'registration_number' => '123490',
                'province' => 'Ontario',
                'registration_class_id' => $registrationClass->id,
            ]);

        $response->assertRedirect('/profile/edit#nurse-section');
    }

    public function test_nurse_application_can_be_updated(): void
    {

        $nurse = Nurse::factory()->create([
            'registration_number' => '1234',
            'province' => 'Ontario',
        ]);

        $uri = 'nurse/' . $nurse->id;

        $response = $this
            ->actingAs($nurse->user)
            ->patch($uri, [
                'registration_number' => '3333',
                'province' => 'Alberta',
                'registration_class_id' => $nurse->registration_class_id,
            ]);


        $response->assertSessionHasNoErrors();

        $nurse->refresh();

        $this->assertSame('3333', $nurse->registration_number);
        $this->assertSame('Alberta', $nurse->province->value);
        $this->assertNull($nurse->verified_at);
    }
}
