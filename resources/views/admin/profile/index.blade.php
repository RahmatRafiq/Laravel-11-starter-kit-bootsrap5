@extends('layouts.app')

@section('content')
<div class="row gx-3">
    <div class="col-xxl-12">
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title">Profile</h5>
            </div>
            <div class="card-body">
                <div class="row gx-3 mb-4">
                    <div class="col-lg-12 col-sm-12 col-12">
                        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <!-- Form Input Name -->
                            <div class="form-group row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                                <div class="col-md-8">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name', $user->name) }}" required autocomplete="name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Form Input Email -->
                            <div class="form-group row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address')
                                    }}</label>
                                <div class="col-md-8">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email', $user->email) }}" required autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Dropzone for Profile Images -->
                            <div class="form-group row mb-3">
                                <label for="images" class="col-md-4 col-form-label text-md-right">Profile Images</label>
                                <div class="col-md-8">
                                    <div class="dropzone" id="myDropzone"></div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group row mb-3">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Profile') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('head')
@vite(['resources/js/dropzoner.js'])
<script src="{{ asset('assets/vendor/toastify/toastify.js') }}"></script>
@endpush

@push('javascript')
<script type="module">
    const element = '#myDropzone';
    const key = 'images';
    const files = [];
    const urlStore = "{!! route('storage.store') !!}";
    const urlDestroy = "{!! route('profile.deleteFile') !!}";
    const csrf = "{!! csrf_token() !!}";
    const acceptedFiles = 'image/*';
    const maxFiles = 3;

    // Tambahkan file yang sudah ada jika ada
    @if($profileImage)
        files.push({
            id: '{{ $profileImage->id }}',
            name: '{{ $profileImage->name }}',
            file_name: '{{ $profileImage->file_name }}',
            size: '{{ $profileImage->size }}',
            type: '{{ $profileImage->mime_type }}',
            url: '{{ $profileImage->getUrl() }}',
            original_url: '{{ $profileImage->getFullUrl() }}',
        });
    @endif

    const dz = Dropzoner(
        element,
        key,
        {
            urlStore,
            urlDestroy,
            csrf,
            acceptedFiles,
            files,
            maxFiles,
            kind: 'image',
        }
    );

    dz.on("success", function(file, response) {
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'images[]';
        input.value = response.path;
        document.querySelector('form').appendChild(input);
    });
</script>

@endpush
