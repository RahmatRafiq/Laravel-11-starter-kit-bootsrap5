@extends('layouts.app')

@section('content')
    <div class="card mb-3">
        <div class="card-body">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title">Permissions Data</h5>
            </div>
            <form action="{{ route('permission.update', $permission->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Permission Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $permission->name }}">
                </div>
                <div class="mb-3">
                    <label for="guard_name" class="form-label">Guard Name</label>
                    <input type="text" class="form-control" id="guard_name" name="guard_name" value="{{ $permission->guard_name }}">
                </div>
                <button type="submit" class="btn btn-primary">Update Permission</button>
            </form>
        </div>
    </div>
@endsection
