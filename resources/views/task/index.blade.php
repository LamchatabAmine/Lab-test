@extends('layouts.master')
{{-- @dd( $project ) --}}
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Taches de {{ $project->name }}</h1>
                </div>
                <div class="col-sm-6">
                        <div class="float-sm-right">
                            <a href="{{route('task.create', $project)}}" class="btn btn-sm btn-primary">Ajouter Tache</a>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session('success') }}.
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header col-md-12">
                            <div class="d-flex justify-content-between align-items-center  p-0">
                                <div class="form-group input-group-sm mb-0 col-md-3">
                                    <form method="GET" action="{{ route('task.index', ['project' => $project->id]) }}">
                                        <select id="project" class="form-control" onchange="updateUrl()">
                                            @forelse ($projects as $projectName)
                                            <option value="{{ $projectName->id }}"
                                                {{ $projectName->id == request('project_id', $project->id) ? 'selected' : '' }}>
                                                {{ $projectName->name }}
                                            </option>
                                            @empty
                                            <option>Empty</option>
                                            @endforelse
                                        </select>
                                    </form>
                                </div>
                                <div class="input-group input-group-sm col-md-3 p-0">
                                    <input id="searchTask" type="text" name="table_search"
                                        class="form-control float-right" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0 table-tasks">
                            @include('task.table')
                        </div>
                        <div class="d-flex justify-content-end align-items-center p-2">
                            <div class="">
                                <ul class="pagination  m-0 float-right">
                                    {{ $tasks->links() }}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
