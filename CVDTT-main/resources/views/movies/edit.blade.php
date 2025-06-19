@extends('CinemaMediator.admin')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

@push('styles')
<link rel="stylesheet" href="{{ asset('asset/css/create.css') }}">
@endpush

@section('title', 'Chỉnh sửa phim')

@section('content')
<div class="container-fluid py-4 col-12 col-lg-9">
    <div class="row justify-content-center">
        <div class="col-12">    
            <div class="card shadow-lg border-0" style="border-radius: 1.5rem;">
                <div class="card-header bg-white border-bottom-0 rounded-top-4 px-4 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 fw-bold text-primary">
                            <i class="fas fa-edit me-2 text-warning"></i>Chỉnh sửa phim
                        </h3>
                        <a href="{{ route('movies.index') }}" class="btn btn-outline-secondary btn-sm rounded-3 px-4 py-2">
                            <i class="fas fa-arrow-left me-1"></i> Quay lại
                        </a>
                    </div>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('movies.update', $movie->movieId) }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="row g-4">
                            <!-- Title -->
                            <div class="col-md-6">
                                <label for="title" class="form-label fw-semibold text-dark">Tên phim <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-heading text-primary"></i></span>
                                    <input type="text" class="form-control shadow-none @error('title') is-invalid @enderror" 
                                           id="title" name="title" value="{{ old('title', $movie->title) }}" 
                                           placeholder="Nhập tên phim" required autocomplete="off">
                                    @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Genre -->
                            <div class="col-md-6">
                                <label for="genre" class="form-label fw-semibold text-dark">Thể loại <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-tags text-primary"></i></span>
                                    <select class="form-select shadow-none @error('genre') is-invalid @enderror" id="genre" name="genre" required>
                                        <option value="">-- Chọn thể loại --</option>
                                        <option value="Hành động" {{ old('genre', $movie->genre) == 'Hành động' ? 'selected' : '' }}>Hành động</option>
                                        <option value="Tình cảm" {{ old('genre', $movie->genre) == 'Tình cảm' ? 'selected' : '' }}>Tình cảm</option>
                                        <option value="Hài hước" {{ old('genre', $movie->genre) == 'Hài hước' ? 'selected' : '' }}>Hài hước</option>
                                        <option value="Kinh dị" {{ old('genre', $movie->genre) == 'Kinh dị' ? 'selected' : '' }}>Kinh dị</option>
                                        <option value="Khoa học viễn tưởng" {{ old('genre', $movie->genre) == 'Khoa học viễn tưởng' ? 'selected' : '' }}>Khoa học viễn tưởng</option>
                                        <option value="Phiêu lưu" {{ old('genre', $movie->genre) == 'Phiêu lưu' ? 'selected' : '' }}>Phiêu lưu</option>
                                        <option value="Tâm lý" {{ old('genre', $movie->genre) == 'Tâm lý' ? 'selected' : '' }}>Tâm lý</option>
                                        <option value="Hoạt hình" {{ old('genre', $movie->genre) == 'Hoạt hình' ? 'selected' : '' }}>Hoạt hình</option>
                                    </select>
                                    @error('genre')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Director -->
                            <div class="col-md-6">
                                <label for="director" class="form-label fw-semibold text-dark">Đạo diễn <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-user-tie text-primary"></i></span>
                                    <input type="text" class="form-control shadow-none @error('director') is-invalid @enderror" 
                                           id="director" name="director" value="{{ old('director', $movie->director) }}" 
                                           placeholder="Nhập tên đạo diễn" required autocomplete="off">
                                    @error('director')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Duration -->
                            <div class="col-md-6">
                                <label for="duration" class="form-label fw-semibold text-dark">Thời lượng <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-clock text-primary"></i></span>
                                    <input type="number" min="1" class="form-control shadow-none @error('duration') is-invalid @enderror" 
                                           id="duration" name="duration" value="{{ old('duration', $movie->duration) }}" 
                                           placeholder="Nhập thời lượng" required>
                                    <span class="input-group-text bg-light">phút</span>
                                    @error('duration')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Release Date -->
                            <div class="col-md-6">
                                <label for="releaseDate" class="form-label fw-semibold text-dark">Ngày công chiếu <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-calendar-alt text-primary"></i></span>
                                    <input type="date" class="form-control shadow-none @error('releaseDate') is-invalid @enderror" 
                                           id="releaseDate" name="releaseDate" value="{{ old('releaseDate', $movie->releaseDate) }}" required>
                                    @error('releaseDate')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Status -->
                            <div class="col-md-6">
                                <label for="status" class="form-label fw-semibold text-dark">Trạng thái <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-lightbulb text-primary"></i></span>
                                    <select class="form-select shadow-none @error('status') is-invalid @enderror" id="status" name="status" required>
                                        <option value="">-- Chọn trạng thái --</option>
                                        <option value="Đang chiếu" {{ old('status', $movie->status) == 'Đang chiếu' ? 'selected' : '' }}>Đang chiếu</option>
                                        <option value="Sắp chiếu" {{ old('status', $movie->status) == 'Sắp chiếu' ? 'selected' : '' }}>Sắp chiếu</option>
                                        <option value="Ngừng chiếu" {{ old('status', $movie->status) == 'Ngừng chiếu' ? 'selected' : '' }}>Ngừng chiếu</option>
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Poster -->
                            <div class="col-md-6">
                                <label for="poster" class="form-label fw-semibold text-dark">Ảnh phim</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-image text-primary"></i></span>
                                    <input type="file" class="form-control shadow-none @error('poster') is-invalid @enderror" 
                                           id="poster" name="poster" accept="image/*" onchange="previewImage(this)">
                                    @error('poster')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mt-3 text-center">
                                    @if ($movie->poster)
                                        <img id="imagePreview" src="{{ asset('storage/'.$movie->poster) }}" alt="Preview" 
                                            class="img-thumbnail" style="max-height: 180px; object-fit: cover; border-radius: 1.1rem;">
                                        <div id="noImagePreview" class="border rounded-3 p-4 text-muted bg-light d-none">
                                            <i class="fas fa-image fa-2x mb-2 text-secondary"></i>
                                            <p class="mb-0 small">Ảnh preview sẽ hiển thị ở đây</p>
                                        </div>
                                    @else
                                        <img id="imagePreview" src="#" alt="Preview" class="img-thumbnail d-none" style="max-height: 180px; object-fit: cover; border-radius: 1.1rem;">
                                        <div id="noImagePreview" class="border rounded-3 p-4 text-muted bg-light">
                                            <i class="fas fa-image fa-2x mb-2 text-secondary"></i>
                                            <p class="mb-0 small">Ảnh preview sẽ hiển thị ở đây</p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <!-- Description -->
                            <div class="col-12">
                                <label for="description" class="form-label fw-semibold text-dark">Tóm tắt nội dung</label>
                                <textarea class="form-control shadow-none @error('description') is-invalid @enderror" 
                                          id="description" name="description" rows="4" 
                                          placeholder="Nhập tóm tắt nội dung phim" style="resize: vertical; border-radius: 14px;">{{ old('description', $movie->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- Buttons -->
                        <div class="d-flex justify-content-end gap-3 mt-5 pt-3 border-top">
                            <a href="{{ route('movies.index') }}" class="btn btn-outline-secondary px-4 py-2 rounded-3">
                                <i class="fas fa-times me-2"></i> Hủy
                            </a>
                            <button type="submit" class="btn btn-primary px-4 py-2 rounded-3 shadow">
                                <i class="fas fa-save me-2"></i> Lưu thay đổi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Toast Thông báo -->
@if (session('mess_error'))
    <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
        <div id="liveToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-danger text-white">
                <strong class="me-auto">Thông báo</strong>
                <small>Vừa xong</small>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body bg-white">
                <i class="fas fa-exclamation-circle text-danger me-2"></i>
                {{ session('mess_error') }}
            </div>
        </div>
    </div>
@endif

<script>
    function previewImage(input) {
        const preview = document.getElementById('imagePreview');
        const noPreview = document.getElementById('noImagePreview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.classList.remove('d-none');
                if(noPreview) noPreview.classList.add('d-none');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    document.addEventListener('DOMContentLoaded', function() {
        const toastEl = document.getElementById('liveToast');
        if (toastEl) {
            const toast = new bootstrap.Toast(toastEl);
            setTimeout(() => {
                toast.hide();
            }, 5000);
        }
        const forms = document.querySelectorAll('.needs-validation');
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    });
</script>

@endsection
