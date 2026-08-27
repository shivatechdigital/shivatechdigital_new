<?php

namespace Tests\Feature;

use App\Models\ClientProject;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_redirected_to_the_login_page(): void
    {
        $response = $this->get(route('dashboard'));
        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_users_can_visit_the_dashboard(): void
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->get(route('dashboard'));
        $response->assertStatus(200);
    }

    public function test_admin_users_can_see_client_project_action_buttons(): void
    {
        $user = User::factory()->create(['role' => 'admin']);
        ClientProject::create([
            'user_id' => $user->id,
            'title' => 'Anandeshwar Trader',
            'project_type' => 'Mobile Application',
            'status' => 'planning',
            'progress' => 0,
            'is_active' => true,
        ]);

        $this->actingAs($user)
            ->get(route('admin.client-projects.index'))
            ->assertOk()
            ->assertSee('Edit')
            ->assertSee('Delete');
    }
}
