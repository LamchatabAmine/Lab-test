<table class="table table-striped text-nowrap">
    <thead>
        <tr>
            {{-- <th>#</th> --}}
            <th>{{ __('Nom') }}</th>
            <th>{{ __('Description') }}</th>
            <th>{{ __('Action') }}</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($projects as $index => $project)
            <tr>
                <td>{{ $project->name }}</td>
                <td>
                    {{ $project->description }}
                </td>
                <td>
                    <a href="{{ route('project.edit', $project) }}" class="btn btn-sm btn-default ">
                            <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <a href="{{ route('task.index', $project) }}" class="btn btn-sm btn-primary">view tasks</a>
                    <form method="POST" action="{{ route('project.destroy', $project) }}" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="confirm('vous êtes sûr')">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7">Aucun projet trouvé.
                    <a href="{{ route('project.create') }}" class="mx-1">Ajouter projet</a>
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
