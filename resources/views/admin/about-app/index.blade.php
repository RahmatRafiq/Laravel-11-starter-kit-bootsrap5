@extends('layouts.app')

@section('content')
<div class="row gx-3">
    <div class="col-xxl-12">
        <div class="card mb-3">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="card-title">Tentang Aplikasi</h5>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ $aboutApp ? route('about-app.update', $aboutApp->id) : route('about-app.store') }}" method="POST">
                    @csrf
                    @if ($aboutApp)
                        @method('PUT')
                    @endif

                    <div class="form-group row mb-3">
                        <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>
                        <div class="col-md-8">
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $aboutApp->title ?? '') }}" required>
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>
                        <div class="col-md-8">
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="5" required>{{ old('description', $aboutApp->description ?? '') }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="contact_email" class="col-md-4 col-form-label text-md-right">Contact Email</label>
                        <div class="col-md-8">
                            <input id="contact_email" type="email" class="form-control @error('contact_email') is-invalid @enderror" name="contact_email" value="{{ old('contact_email', $aboutApp->contact_email ?? '') }}">
                            @error('contact_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="contact_phone" class="col-md-4 col-form-label text-md-right">Contact Phone</label>
                        <div class="col-md-8">
                            <input id="contact_phone" type="text" class="form-control @error('contact_phone') is-invalid @enderror" name="contact_phone" value="{{ old('contact_phone', $aboutApp->contact_phone ?? '') }}">
                            @error('contact_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="contact_address" class="col-md-4 col-form-label text-md-right">Contact Address</label>
                        <div class="col-md-8">
                            <input id="contact_address" type="text" class="form-control @error('contact_address') is-invalid @enderror" name="contact_address" value="{{ old('contact_address', $aboutApp->contact_address ?? '') }}">
                            @error('contact_address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ $aboutApp ? 'Update' : 'Save' }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
