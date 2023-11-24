<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use DatabaseTransactions;

    public function test_categories_are_displayed()
    {
        $response = $this->get('/categories');

        $response->assertOk();
    }

    public function test_a_user_can_create_category_with_permission()
    {
        $user = User::factory()->create();

        $user->givePermissionTo('create categories');

        $response = $this
            ->actingAs($user)
            ->get('/admin/category/create');

        $response->assertOk();

    }

    public function test_a_user_can_edit_category_with_permission()
    {
        $user = User::factory()->create();

        $user->givePermissionTo('edit categories');

        $category = Category::first();

        $response = $this
            ->actingAs($user)
            ->get(route('admin_category.edit', $category->id));

        $response->assertOk();

    }

}
