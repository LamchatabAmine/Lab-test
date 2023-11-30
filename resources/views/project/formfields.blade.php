



<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ isset($project) ? 'Edit Project' : 'Add Project' }}</h3>
    </div>
    <form method="POST" action="{{ isset($project) ? route('project.update', $project->id) : route('project.store') }}">
        @csrf
        @if (isset($project))
            @method('PUT')
        @endif
        <div class="card-body">
            <div class="form-group mb-0">
                <label for="nom">Nom</label>
                <input name="name" type="text" class="form-control" id="nom" placeholder="Enter nom"
                    value="{{ old('name', isset($project) ? $project->name : '') }}">
            </div>
            @error('name')
                <div class="text-danger mb-0">{{ $message }}</div>
            @enderror
            <div class="form-group mt-2 mb-0">
                <label for="Description">Description</label>
                <input name="description" type="text" class="form-control" id="Description" placeholder="Description"
                    value="{{ old('description', isset($project) ? $project->description : '') }}">
            </div>
            @error('description')
                <div class="text-danger ">{{ $message }}</div>
            @enderror
        </div>
        <div class="card-footer">
            <a href="{{ route('project.index') }}" class="btn btn-default">Cancel</a>
            <button type="submit" class="btn btn-primary mx-2">{{ isset($project) ? 'Update' : 'Submit' }}</button>
        </div>
    </form>
</div>
