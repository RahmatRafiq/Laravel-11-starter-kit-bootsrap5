@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Role {{ $role->name }}</h1>

    <form action="{{ route('role.addPermission', $role->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="col-xxl-12">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="d-flex align-content-start flex-wrap">
                        <select id="js-example-basic-multiple" name="permission[]" multiple="multiple">
                            @foreach ($permissions as $permission)
                            <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Update Permission</button>
    </form>
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