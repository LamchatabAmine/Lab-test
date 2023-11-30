<?php

namespace Tests\Unit;


use Tests\TestCase;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Foundation\Testing\RefreshDatabase;


class TasksTest extends TestCase
{
    use RefreshDatabase;


    public function test_index_tasks(): void
    {
        // Create a project for testing
        $project = Project::factory()->create();

        // Create tasks for the project
        $tasks = Task::factory(5)->create(['project_id' => $project->id]);

        // Simulate a request to the index method
        $response = $this->get(route('task.index', ['project' => $project]));

        // Assert that the response is successful
        $response->assertSuccessful();

        // Assert that the response view is 'task.index'
        $response->assertViewIs('task.index');

        // Assert that the view has the expected variables
        $response->assertViewHas('tasks');
        $response->assertViewHas('project', $project);
        $response->assertViewHas('projects', Project::all());
    }




    public function test_create_task_view(): void
    {
        // Create a project for testing
        $project = Project::factory()->create();

        // Simulate a request to the create method
        $response = $this->get(route('task.create', ['project' => $project]));

        // Assert that the response is successful
        $response->assertSuccessful();

        // Assert that the response view is 'task.create'
        $response->assertViewIs('task.create');

        // Assert that the view has the project variable
        $response->assertViewHas('project', $project);
    }




    public function test_store_task(): void
    {
        // Create a project for testing
        $project = Project::factory()->create();

        // dd($project);

        // Simulate a request with necessary data
        $response = $this->post(route('task.store', ['project' => $project]), [
            'name' => 'Test Task',
            'description' => 'This is a test task.',
        ]);

        // Assert that the task was created in the database
        $this->assertDatabaseHas('tasks', [
            'name' => 'Test Task',
            'description' => 'This is a test task.',
            'project_id' => $project->id,
        ]);

         // Assert that the response redirects to the task index route with success message
        $response->assertRedirect(route('task.index', ['project' => $project]))
                    ->assertSessionHas('success', 'Tache créé avec succès');
        // $this->assertTrue(true);

    }




    public function test_edit_task_view(): void
    {
        // Create a project and task for testing
        $project = Project::factory()->create();
        $task = Task::factory()->create(['project_id' => $project->id]);

        // Simulate a request to the edit method
        $response = $this->get(route('task.edit', ['project' => $project, 'task' => $task]));

        // Assert that the response is successful
        $response->assertSuccessful();

        // Assert that the response view is 'task.edit'
        $response->assertViewIs('task.edit');

        // Assert that the view has the task and project variables
        $response->assertViewHas('task', $task);
        $response->assertViewHas('project', $project);
    }




    public function test_update_task(): void
    {
        // Create a project and task for testing
        $project = Project::factory()->create();
        $task = Task::factory()->create(['project_id' => $project->id]);

        // Simulate a request to the update method with necessary data
        $response = $this->put(route('task.update', ['project' => $project, 'task' => $task]), [
            'name' => 'Updated Task',
            'description' => 'This task has been updated.',
        ]);

        // Assert that the task was updated in the database with the expected data
        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'name' => 'Updated Task',
            'description' => 'This task has been updated.',
            'project_id' => $project->id,
        ]);

        // Assert that the response redirects to the task index route with success message
        $response->assertRedirect(route('task.index', ['project' => $project]))
                    ->assertSessionHas('success', 'Tache updated avec succès');
    }



    public function test_destroy_task(): void
    {
        // Create a project and task for testing
        $project = Project::factory()->create();
        $task = Task::factory()->create(['project_id' => $project->id]);

        // Simulate a request to the destroy method
        $response = $this->delete(route('task.destroy', ['project' => $project, 'task' => $task]));

        // Assert that the task was deleted from the database
        $this->assertDatabaseMissing('tasks', ['id' => $task->id]);

        // Assert that the response redirects to the task index route with success message
        $response->assertRedirect(route('task.index', ['project' => $project]))
                    ->assertSessionHas('success', 'tache supprimé avec succès');
    }






    public function test_search_task(): void
    {
        // Create a project and tasks for testing
        $project = Project::factory()->create();
        $tasks = Task::factory(5)->create(['project_id' => $project->id]);

        // Simulate an AJAX request to the searchTask method with a search query
        $response = $this->json('GET', route('search.task', ['project' => $project]), ['search' => 'Test Task']);

        // Assert that the response is successful
        $response->assertSuccessful();

        // Decode the JSON response
        // $jsonResponse = $response->json();

        // // Assert that the response contains the expected keys
        // $this->assertArrayHasKey('table', $jsonResponse);
        // $this->assertArrayHasKey('pagination', $jsonResponse);

        // You might want to add more specific assertions based on the actual structure of your JSON response

        // $responseTasks = json_decode($response->getContent())->table->data;
        // foreach ($tasks as $task) {
        //     if (Str::contains($task->name, 'Test Task')) {
        //         $this->assertTrue(in_array($task->id, $responseTasks));
        //     } else {
        //         $this->assertFalse(in_array($task->id, $responseTasks));
        //     }
        // }
    }







}
