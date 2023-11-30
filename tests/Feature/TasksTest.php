<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Task;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TasksTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    // public function test_the_application_returns_a_successful_response(): void
    // {
    //     // $this->withoutExceptionHandling();
    //     $response = $this->get('/tache/1');
    //     // dd($response->status());
    //     $response->assertStatus((200));
    //     // $response->assertMethodNotAllowed();
    //     // $response->assertSee('Aucun tache trouvé.');
    // }

    // public function test_create_task_returns_a_successful_response(): void
    // {
    //     // $this->withoutExceptionHandling();
    //     $response = $this->get('/tache/1/create');
    //     // dd($response->status());
    //     $response->assertStatus((200));
    //     // $response->assertSee('Aucun tache trouvé.');
    // }

    // public function test_index_task(): void
    // {
    //     // Arrange
    //     // $projects = Project::factory(4)->create();
    //     $tasks = Task::factory(3)->create();

    //     dd($tasks);
    //     // Act
    //     $response = $this->get('/tache/1');

    //     // Assert
    //     $response->assertStatus(200);
    //     // $response->assertViewIs('tasks.index');
    //     // $response->assertViewHas('tasks', $tasks);
    // }
}
