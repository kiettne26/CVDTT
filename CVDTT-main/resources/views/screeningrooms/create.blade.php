@extends('CinemaMediator.admin')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

@push('styles')
<link rel="stylesheet" href="{{ asset('asset/css/create.css') }}">
@endpush

@section('title', 'Thêm phòng chiếu mới')

@section('content')
<div class="container-fluid py-4 col-12 col-lg-9">
    <div class="row justify-content-center">
        <div class="col-12">    
            <div class="card shadow-lg border-0" style="border-radius: 1.5rem;">
                <div class="card-header bg-white border-bottom-0 rounded-top-4 px-4 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 fw-bold text-primary">
                            <i class="fas fa-door-open me-2 text-info"></i>Thêm Phòng Chiếu Mới
                        </h3>
                        <a href="{{ route('screeningrooms.index') }}" class="btn btn-outline-secondary btn-sm rounded-3 px-4 py-2">
                            <i class="fas fa-arrow-left me-1"></i> Quay lại
                        </a>
                    </div>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('screeningrooms.store') }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="row g-4">
                            <!-- Tên phòng -->
                            <div class="col-md-6">
                                <label for="roomName" class="form-label fw-semibold text-dark">Tên phòng <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-heading text-primary"></i></span>
                                    <input type="text" class="form-control shadow-none @error('roomName') is-invalid @enderror"
                                           id="roomName" name="roomName" value="{{ old('roomName') }}"
                                           placeholder="Nhập tên phòng chiếu" required autocomplete="off">
                                    @error('roomName')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Sức chứa -->
                            <div class="col-md-6">
                                <label for="capacity" class="form-label fw-semibold text-dark">Sức chứa <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-users text-success"></i></span>
                                    <input type="number" min="1" class="form-control shadow-none @error('capacity') is-invalid @enderror"
                                           id="capacity" name="capacity" value="{{ old('capacity') }}"
                                           placeholder="Nhập sức chứa phòng" required>
                                    @error('capacity')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Loại phòng -->
                            <div class="col-md-6">
                                <label for="roomType" class="form-label fw-semibold text-dark">Loại phòng <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-door-closed text-warning"></i></span>
                                    <input type="text" class="form-control shadow-none @error('roomType') is-invalid @enderror"
                                           id="roomType" name="roomType" value="{{ old('roomType') }}"
                                           placeholder="Nhập loại phòng (VIP, Thường...)" required>
                                    @error('roomType')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Trạng thái -->
                            <div class="col-md-6">
                                <label for="isAvailable" class="form-label fw-semibold text-dark">Trạng thái <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-check-circle text-info"></i></span>
                                    <select class="form-select shadow-none @error('isAvailable') is-invalid @enderror"
                                            id="isAvailable" name="isAvailable" required>
                                        <option value="">-- Chọn trạng thái --</option>
                                        <option value="yes" {{ old('isAvailable') == 'yes' ? 'selected' : '' }}>Sẵn sàng</option>
                                        <option value="no" {{ old('isAvailable') == 'no' ? 'selected' : '' }}>Không sẵn sàng</option>
                                    </select>
                                    @error('isAvailable')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- Buttons -->
                        <div class="d-flex justify-content-end gap-3 mt-5 pt-3 border-top">
                            <a href="{{ route('screeningrooms.index') }}" class="btn btn-outline-secondary px-4 py-2 rounded-3">
                                <i class="fas fa-times me-2"></i> Hủy
                            </a>
                            <button type="submit" class="btn btn-primary px-4 py-2 rounded-3 shadow">
                                <i class="fas fa-plus-circle me-2"></i> Thêm phòng
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
