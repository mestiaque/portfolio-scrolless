@extends('me::master')
@section('title', 'Create New Project')
@push('buttons')
<a href="{{ route('admin.projects.index') }}" class="btn btn-sm btn-encodex-list">
    <i class="fas fa-arrow-left"></i> Back to Projects
</a>
@endpush
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">

            <div class="card-body">
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group mb-3">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-sm @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                                @error('title')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control form-control-sm @error('description') is-invalid @enderror" id="description" name="description" rows="5">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="url">Project URL</label>
                                        <input type="url" class="form-control form-control-sm @error('url') is-invalid @enderror" id="url" name="url" value="{{ old('url') }}" placeholder="https://example.com">
                                        @error('url')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="github_url">GitHub URL</label>
                                        <input type="url" class="form-control form-control-sm @error('github_url') is-invalid @enderror" id="github_url" name="github_url" value="{{ old('github_url') }}" placeholder="https://github.com/username/repo">
                                        @error('github_url')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="technologies">Technologies</label>
                                <input type="text" class="form-control form-control-sm @error('technologies') is-invalid @enderror" id="technologies" name="technologies" value="{{ old('technologies') }}" placeholder="Laravel, Vue.js, MySQL (comma separated)">
                                <small class="form-text text-muted">Enter technologies separated by commas</small>
                                @error('technologies')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="image">Project Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="image" name="image" accept="image/*">
                                    <label class="custom-file-label" for="image">Choose file</label>
                                    @error('image')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <small class="form-text text-muted">Max size: 2MB. Formats: jpeg, png, jpg, gif, svg</small>
                            </div>

                            <div class="form-group mb-3">
                                <label for="order">Order</label>
                                <input type="number" class="form-control form-control-sm @error('order') is-invalid @enderror" id="order" name="order" value="{{ old('order', 0) }}" min="0">
                                @error('order')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="form-check form-switch mb-3 mt-4">
                                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" {{ old('is_active', true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Active</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-end">
                        <a href="{{ route('admin.projects.index') }}" class="btn btn-encodex-cancel">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-encodex-save">
                            <i class="fas fa-save"></i> Create Project
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('js')
<script>
    // Update custom file input label
    document.getElementById('image').addEventListener('change', function(e) {
        var fileName = e.target.files[0].name;
        e.target.nextElementSibling.textContent = fileName;
    });
</script>
@endpush
