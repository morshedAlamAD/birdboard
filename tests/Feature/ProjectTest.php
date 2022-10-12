<?php

namespace Tests\Feature;

use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;
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

    /** @test */
    public function test_only_the_author_can_see_project()
    {
        $this->signIn();
        $attribute=Project::factory()->create();
        $this->get($attribute->path())->assertStatus(403);
    }
    /** @test */
    public function test_every_element_should_be_shown_in_project_page()
    {
        $this->withoutExceptionHandling();
        $user=User::factory()->create();
        $this->actingAs($user);
        $project=Project::factory()->raw(['users_id'=>$user->id]);
        // dd($project);
        $this->post('/project', $project);
        $attribute = Project::where($project)->first();
        // dd($attribute);
        $this->get($attribute->path())->assertSee($attribute->title)->assertSee(Str::limit($attribute->description, 100, '...'))->assertSee($attribute->note);
    }
    /** @test */
    public function user_should_be_able_to_update_project()
    {
        $this->withoutExceptionHandling();
        $user=User::factory()->create();
        $this->actingAs($user);
        $project=Project::factory()->create(['users_id'=>$user->id]);
        $this->patch($project->path(), ['title'=>'changed','description'=>'changed','note'=>'changed'])->assertRedirect($project->path());
        $this->assertDatabaseHas('projects', ['title'=>'changed','description'=>'changed','note'=>'changed']);
        $this->get($project->path().'/edit')->assertOk();
    }
    /** @test */
    public function test_loged_in_user_can_see_project()
    {
        $this->withExceptionHandling();
        $user=User::factory()->create();
        $this->actingAs($user);
        $attribute=Project::factory()->create(['users_id'=>$user->id]);
        // dd($attribute->path());
        $this->get($attribute->path())->assertSee($attribute->title);
    }
}
