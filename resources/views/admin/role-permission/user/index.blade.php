@extends('layouts.app')

@section('content')
<div class="card mb-3">
    <div class="alert alert-info" role="alert">
        <h4 class="alert-heading">Customize Role Badges</h4>
        <p>You can change the color of the role badges by editing the <code>assets/css/badges.css</code> file.</p>
        <hr>
        <p class="mb-0">Make sure to refresh the page after making changes to see the updated badge colors.</p>
    </div>
    <div class="card-body">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title">User Data</h5>
            <div class="mb-3">
                <a href="{{ route('user.create') }}" class="btn btn-success">Create New User</a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table styled-table" id="users">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@push('css')
<link rel="stylesheet" href="{{ asset('assets/DataTables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/badges.css') }}">
@endpush
@push('javascript')
<script src="{{ asset('assets/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
<script>
    $('#users').DataTable(
                {
                    responsive: true,
                    serverSide: true,
                    processing: true,
                    paging: true,
                    ajax: {
                        url: '{{ route('user.json') }}',
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    },
                    columns: [
                        {
                            data: 'id',
                        },
                        {
                            data: 'name',
                        },
                        {
                            data: 'roles',
                            render: function(data, type, row) {
                                return data.map(function(role) {
                                    // role badge with bg
                                    const roleClass = role.name
                                        .replaceAll(' ', '_')
                                        .toLowerCase();
                                    return `<span class="badge text-capitalize bg-${roleClass}">${role.name}</span>`;
                                }).join(', ');
                            },
                            orderable: false,
                        },
                        {
                            data: 'email',
                        },
                        {
                            data: 'created_at',
                        },
                        {
                            data: 'updated_at',
                        },
                        {
                            data: 'action',
                            orderable: false,
                            searchable: false,
                            // RENDER
                            render: function(data, type, row) {
                                // create element
                                const editButton = document.createElement('a');
                                editButton.classList.add('btn', 'btn-primary', 'me-2');
                                editButton.href = `{{ route('user.edit', ':id') }}`.replace(
                                    ':id',
                                    row.id
                                );
                                editButton.textContent = 'Edit';

                                // delete use Swal as confirmation
                                const deleteButton = document.createElement('button');
                                deleteButton.classList.add('btn', 'btn-danger');
                                deleteButton.textContent = 'Delete';
                                deleteButton.addEventListener('click', function() {
                                    deleteRow(row.id);
                                });
                                console.log(row.id)
                                // Add the buttons to a container element
                                const container = document.createElement('div');
                                container.appendChild(editButton);
                                container.appendChild(deleteButton);

                                // Return the container element
                                return container;
                            }
                        }
                    ]
                }
            );

        // delete row
        function deleteRow(id) {
            const url = `{{ route('user.destroy', ':id') }}`
            // console
            console.log(
                'deleteRow -> id',
                id,
                url,
                url.replace(':id', id)
            );
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this user!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url.replace(':id', id),
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            _method: 'DELETE',
                        },
                        success: function(response) {
                            $('#users').DataTable().ajax.reload();
                            Swal.fire('Deleted!', 'User has been deleted.', 'success');
                        },
                        error: function(xhr) {
                            Swal.fire('Error!', 'Failed to delete user.', 'error');
                        }
                    });
                }
            });
        }
</script>
@endpush