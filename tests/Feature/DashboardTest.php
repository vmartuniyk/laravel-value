<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_page_is_displayed(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get('/dashboard');

        $response->assertOk();
    }

    public function test_dashboard_form_can_be_send(): void
    {
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post('/dashboard', [
                'value_a' => 2,
                'value_b' => 4,
                'value_c' => 3,
            ]);

        $response
            ->assertSessionHasNoErrors()
            ->assertRedirect('/dashboard');
    }


}
