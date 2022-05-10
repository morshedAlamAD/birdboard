<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase,WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_for_creating_project()
    {
        $user=User::factory()->create();
        $this->actingAs($user);
        $attribute=Project::factory()->raw(['users_id'=>$user->id]);
        $this->post('/project', $attribute);
        $this->assertDatabaseHas('projects', $attribute);
    }
    public function test_for_showing_project()
    {
        $user=User::factory()->create();
        $this->actingAs($user);
        $attribute=Project::factory()->raw(['users_id'=>$user->id]);
        $this->post('/project', $attribute);
        $this->get('/project')->assertSee($attribute['title']);
    }
    /** @test */
    public function test_for_validation_of_title()
    {
        $user=User::factory()->create();
        $this->actingAs($user);
        $attribute=Project::factory()->raw(['title'=>'','users_id'=>$user->id]);
        $this->post('/project', $attribute)->assertSessionHasErrors('title');
    }
    /** @test */
    public function test_for_validation_of_description()
    {
        $user=User::factory()->create();
        $this->actingAs($user);
        $attribute=Project::factory()->raw(['description'=>'','users_id'=>$user->id]);
        $this->post('/project', $attribute)->assertSessionHasErrors('description');
    }
    /**@test */
    public function test_to_login_to_see_project()
    {
        $attribute=Project::factory()->create();
        $this->get('/project')->assertRedirect('/login');
        $this->get($attribute->path())->assertRedirect('/login');
    }
    /**@test */
    public function test_loged_in_user_can_see_project()
    {
        $user=User::factory()->create();
        $this->actingAs($user);
        $attribute=Project::factory()->create();
        $this->get($attribute->path())->assertSee($attribute->title, $attribute->description);
    }
}
