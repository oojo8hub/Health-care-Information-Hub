<?php

namespace Tests\Feature;

use App\Models\Guide;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class GuideTest extends TestCase
{
    use DatabaseTransactions;

    public function test_a_to_z_guide_is_displayed(): void
    {
        $response = $this->get('/a-to-z-guides');

        $response->assertOk();
    }

    public function test_visitor_cannot_see_unpublished_guides()
    {
        $guide = Guide::where('published', 0)->first();

        $this->get(route('guide.show', $guide->slug))->assertNotFound();
    }

    public function test_writer_can_create_guide()
    {
        $user = User::factory()->create();

        $user->assignRole('writer');

        $response = $this
            ->actingAs($user)
            ->get('/guide/create');

        $response->assertOk();
    }

    public function test_user_with_create_guides_can_create_guides()
    {
        $user = User::factory()->create();

        $user->givePermissionTo('create guides');

        $response = $this
            ->actingAs($user)
            ->get('/guide/create');

        $response->assertOk();
    }

    public function test_user_cannot_create_guide_without_permission()
    {
        $user = User::factory()->create();
        $response = $this
            ->actingAs($user)
            ->get('/guide/create');

        $this->assertEquals(403, $response->status());
    }

    public function test_user_can_edit_any_guide_with_permission()
    {
        $guide = Guide::factory()->create();

        $user = User::factory()->create();

        $user->givePermissionTo('edit guides');

        $response = $this
            ->actingAs($user)
            ->get(route('guide.edit', $guide->slug));

        $response->assertOk();
    }


}
