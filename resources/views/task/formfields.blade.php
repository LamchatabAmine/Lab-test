

{{-- @dd($project) --}}

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ isset($task) ? 'Edit task' : 'Add task' }}</h3>
    </div>
    <form method="POST"
        action="{{ isset($task) ? route('task.update', ['project' => $project, 'task' => $task]) : route('task.store', $project) }}">
        @csrf
        @if (isset($task))
            @method('PUT')
        @endif
        <div class="card-body">
            <div class="form-group mb-0">
                <label for="nom">Nom</label>
                <input name="name" type="text" class="form-control" id="nom" placeholder="Enter nom"
                    value="{{ old('name', isset($task) ? $task->name : '') }}">
            </div>
            @error('name')
                <div class="text-danger mb-0">{{ $message }}</div>
            @enderror
            <div class="form-group mt-2 mb-0">
                <label for="Description">Description</label>
                <input name="description" type="text" class="form-control" id="Description" placeholder="Description"
                    value="{{ old('description', isset($task) ? $task->description : '') }}">
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('task.index', $project) }}" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-primary">{{ isset($task) ? 'Update' : 'Submit' }}</button>
        </div>
    </form>
</div>
