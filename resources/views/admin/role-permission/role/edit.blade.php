@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-3">
        <div class="card-body">
            <h1>Edit Role</h1>

            <form action="{{ route('role.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="col-xxl-12">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Role Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="guard_name" class="form-label">Guard Name</label>
                                <input type="text" class="form-control" id="guard_name" name="guard_name" value="{{ $role->guard_name }}">
                            </div>
                            <select id="js-example-basic-multiple" name="permissions[]" multiple="multiple">
                                @foreach ($permissions as $permission)
                                <option value="{{ $permission ->name }}"
                                    @if ($role->permissions->contains($permission->id))
                                    selected
                                    @endif
                                    >{{ $permission->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Update Role</button>
            </form>
        </div>
    </div>
</div>
@endsection

@push('css')
<link href="{{ asset('assets/select2/dist/css/select2.min.css') }}" rel="stylesheet" />
@endpush

@push('javascript')
<script src="{{ asset('assets/select2/dist/js/select2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#js-example-basic-multiple').select2();
    });
</script>
@endpush