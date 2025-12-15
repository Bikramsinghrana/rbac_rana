@extends('layouts.admin')

@section('content')
<div class="container">
    <h3 class="mb-4">Roles & Permissions</h3>

    @foreach($roles as $role)
        <form method="POST" action="{{ route('admin.roles.update', $role->id) }}" class="card mb-3">
            @csrf
            @method('PUT')

            <div class="card-header bg-dark text-white">
                {{ ucfirst($role->name) }}
            </div>

            <div class="card-body">
                <div class="row">
                    @forelse($permissions as $permission)
                        <div class="col-md-3 mb-2">
                            <label class="form-check-label">
                                <input
                                    type="checkbox"
                                    name="permissions[]"
                                    value="{{ $permission->name }}"
                                    class="form-check-input"
                                    {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}
                                >
                                {{ $permission->name }}
                            </label>
                        </div>
                    @empty
                        <p class="text-muted">No permissions available</p>
                    @endforelse
                </div>
            </div>

            <div class="card-footer text-end">
                <button class="btn btn-success btn-sm">Save Permissions</button>
            </div>
        </form>
    @endforeach
</div>
@endsection
