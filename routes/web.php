<?php

use App\Models\Project;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Resourceful routes for projects
// Route::get('/', function () {
//     return redirect()->route('project.index');
// });





// Route::resource('project', ProjectController::class);

// Route::resource('task', TaskController::class);
Route::get('tache/{project}', [TaskController::class, 'index'])->name("task.index");
Route::get('tache/{project}/create', [TaskController::class, 'create'])->name("task.create");
Route::post('tache/{project}/create', [TaskController::class, 'store'])->name("task.store");
Route::get('tache/{project}/edit/{task}', [TaskController::class, 'edit'])->name("task.edit");
Route::PUT('tache/{project}/{task}', [TaskController::class, 'update'])->name("task.update");
Route::DELETE('tache/{project}/{task}', [TaskController::class, 'destroy'])->name("task.destroy");
Route::get('/{project}/search', [TaskController::class, 'searchTask'])->name("search.task");




// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();
































Route::get('/', function () {
    // Get the ID of the first project
    $project = Project::orderBy('id')->first();
    // Check if a project is found before redirecting
    if ($project) {
        return redirect()->route('task.index', ['project' => $project]);
    } else {
        // Handle the case where no projects are available
        // You may want to customize this part based on your application's logic
        return 'No projects found.';
    }
});
