@extends('CinemaMediator.admin')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

@push('styles')
<link rel="stylesheet" href="{{ asset('asset/css/create.css') }}">
@endpush

@section('title', 'Thêm món ăn mới')

@section('content')
<div class="container-fluid py-4 col-12 col-lg-9">
    <div class="row justify-content-center">
        <div class="col-12">    
            <div class="card shadow-lg border-0" style="border-radius: 1.5rem;">
                <div class="card-header bg-white border-bottom-0 rounded-top-4 px-4 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 fw-bold text-primary">
                            <i class="fas fa-hamburger me-2 text-warning"></i>Thêm Món Ăn Mới
                        </h3>
                        <a href="{{ route('foods.index') }}" class="btn btn-outline-secondary btn-sm rounded-3 px-4 py-2">
                            <i class="fas fa-arrow-left me-1"></i> Quay lại
                        </a>
                    </div>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('foods.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                        @csrf
                        <div class="row g-4">
                            <!-- Name -->
                            <div class="col-md-6">
                                <label for="name" class="form-label fw-semibold text-dark">Tên món ăn <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-utensils text-success"></i></span>
                                    <input type="text" class="form-control shadow-none @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name') }}" 
                                           placeholder="Nhập tên món ăn" required autocomplete="off">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Price -->
                            <div class="col-md-6">
                                <label for="price" class="form-label fw-semibold text-dark">Giá tiền <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-money-bill-wave text-primary"></i></span>
                                    <input type="number" min="0" class="form-control shadow-none @error('price') is-invalid @enderror" 
                                           id="price" name="price" value="{{ old('price') }}" 
                                           placeholder="Nhập giá món ăn" required>
                                    <span class="input-group-text bg-light">₫</span>
                                    @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Poster -->
                            <div class="col-md-6">
                                <label for="poster" class="form-label fw-semibold text-dark">Ảnh món ăn</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-image text-primary"></i></span>
                                    <input type="file" class="form-control shadow-none @error('poster') is-invalid @enderror" 
                                           id="poster" name="poster" accept="image/*" onchange="previewImage(this)">
                                    @error('poster')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mt-3 text-center">
                                    <img id="imagePreview" src="#" alt="Preview" 
                                         class="img-thumbnail d-none" style="max-height: 180px; object-fit: cover; border-radius: 1.1rem;">
                                    <div id="noImagePreview" class="border rounded-3 p-4 text-muted bg-light">
                                        <i class="fas fa-image fa-2x mb-2 text-secondary"></i>
                                        <p class="mb-0 small">Ảnh preview sẽ hiển thị ở đây</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Description -->
                            <div class="col-12">
                                <label for="description" class="form-label fw-semibold text-dark">Mô tả</label>
                                <textarea class="form-control shadow-none @error('description') is-invalid @enderror" 
                                          id="description" name="description" rows="4" 
                                          placeholder="Nhập mô tả món ăn" style="resize: vertical; border-radius: 14px;">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- Buttons -->
                        <div class="d-flex justify-content-end gap-3 mt-5 pt-3 border-top">
                            <a href="{{ route('foods.index') }}" class="btn btn-outline-secondary px-4 py-2 rounded-3">
                                <i class="fas fa-times me-2"></i> Hủy
                            </a>
                            <button type="submit" class="btn btn-primary px-4 py-2 rounded-3 shadow">
                                <i class="fas fa-plus-circle me-2"></i> Thêm món
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
                noPreview.classList.add('d-none');
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.classList.add('d-none');
            noPreview.classList.remove('d-none');
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
