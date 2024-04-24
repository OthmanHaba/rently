<?php

namespace Tests\Feature;

use App\Models\Booking;
use App\Models\Category;
use App\Models\Rentable;
use App\Models\Review;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class WorkFlowTest extends TestCase
{
    /** @test */
    public function a_user_can_register()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/register', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('users', [
            'email' => 'john@example.com',
        ]);
    }
    /** @test */
    public function a_registered_user_can_login()
    {
        $user = User::factory()->create([
            'password' => bcrypt($password = 'i-love-laravel'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);

        $response->assertRedirect('/home');
        $this->assertAuthenticatedAs($user);
    }
    /** @test */
    public function a_host_can_create_a_rentable_item()
    {
        $this->actingAs($user = User::factory()->create());
        $category = Category::factory()->create();

        $response = $this->post('/rentables', [
            'title' => 'Mountain Bike',
            'description' => 'A sturdy mountain bike.',
            'category_id' => $category->id,
        ]);

        $response->assertOk();
        $this->assertCount(1, Rentable::all());
    }
    /** @test */
    public function a_user_can_book_a_rentable_item()
    {
        $this->actingAs($user = User::factory()->create());
        $rentable = Rentable::factory()->create();

        $response = $this->post('/bookings', [
            'rentable_id' => $rentable->id,
            'user_id' => $user->id,
        ]);

        $response->assertOk();
        $this->assertCount(1, Booking::all());
    }
    /** @test */
    public function a_user_can_leave_a_review_after_booking()
    {
        $booking = Booking::factory()->create();

        $response = $this->post('/reviews', [
            'rentable_id' => $booking->rentable_id,
            'user_id' => $booking->user_id,
            'rating' => 5,
            'review_text' => 'Great experience!',
        ]);

        $response->assertOk();
        $this->assertCount(1, Review::all());
    }


    public function test_a_user_can_leave_a_review_after_booking()
    {
        $booking = Booking::factory()->create();

        $response = $this->post('/reviews', [
            'rentable_id' => $booking->rentable_id,
            'user_id' => $booking->user_id,
            'rating' => 5,
            'review_text' => 'Great experience!',
        ]);

        $response->assertOk();
        $this->assertCount(1, Review::all());
    }
    /** @test */
    public function an_admin_can_assign_roles_to_a_user()
    {
        $this->withoutExceptionHandling();
        // Assuming you have an admin middleware and role setup
        $admin = User::factory()->create(['is_admin' => true]);
        $user = User::factory()->create();
        $role = UserRole::factory()->create(['role_name' => 'Host']);

        $response = $this->actingAs($admin)->post("/user_roles/{$user->id}/assign", [
            'role_id' => $role->id,
        ]);

        $response->assertOk();
        $this->assertDatabaseHas('users_roles', [
            'user_id' => $user->id,
            'role_id' => $role->id,
        ]);
    }
    /** @test */
    public function a_host_can_add_dynamic_properties_to_a_rentable()
    {
        $user = User::factory()->create();
        $rentable = Rentable::factory()->create(['owner_id' => $user->id]);
        $this->actingAs($user);

        $response = $this->post("/rentables/{$rentable->id}/properties", [
            'key' => 'color',
            'value' => 'red',
        ]);

        $response->assertOk();
        $this->assertDatabaseHas('dynamic_properties', [
            'rentable_id' => $rentable->id,
            'key' => 'color',
            'value' => 'red',
        ]);
    }
    /** @test */
    public function a_host_can_record_maintenance_for_a_rentable()
    {
        $host = User::factory()->create();
        $rentable = Rentable::factory()->create(['owner_id' => $host->id]);
        $this->actingAs($host);

        $response = $this->post("/maintenance_and_repairs", [
            'rentable_id' => $rentable->id,
            'maintenance_date' => now()->toDateString(),
            'details' => 'Replaced brake pads',
            'cost' => 100.00,
        ]);

        $response->assertOk();
        $this->assertDatabaseHas('maintenance_and_repairs', [
            'rentable_id' => $rentable->id,
            'details' => 'Replaced brake pads',
        ]);
    }
    /** @test */
    public function a_user_can_cancel_a_booking()
    {
        $user = User::factory()->create();
        $booking = Booking::factory()->create(['user_id' => $user->id]);
        $this->actingAs($user);

        $response = $this->delete("/bookings/{$booking->id}");

        $response->assertRedirect('/bookings');
        $this->assertSoftDeleted('bookings', [
            'id' => $booking->id,
        ]);
    }
    /** @test */
    public function users_can_filter_rentables_by_category()
    {
        Category::factory()->count(3)->create();
        $category = Category::first();
        Rentable::factory()->create(['category_id' => $category->id]);

        $response = $this->get("/rentables?category={$category->id}");

        $response->assertOk()
            ->assertJsonCount(1, 'data')
            ->assertJsonPath('data.0.category_id', $category->id);
    }




}
