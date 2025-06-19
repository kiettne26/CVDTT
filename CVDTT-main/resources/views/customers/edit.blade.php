@extends('CinemaMediator.admin')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

@push('styles')
<link rel="stylesheet" href="{{ asset('asset/css/create.css') }}">
@endpush
@section('title', 'Chỉnh sửa khách hàng')

@section('content')
<div class="container-fluid py-4 col-12 col-lg-9">
    <div class="row justify-content-center">
        <div class="col-12">    
            <div class="card shadow-lg border-0" style="border-radius: 1.5rem;">
                <div class="card-header bg-white border-bottom-0 rounded-top-4 px-4 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 fw-bold text-primary">
                            <i class="fas fa-user-edit me-2 text-warning"></i>Chỉnh sửa khách hàng
                        </h3>
                        <a href="{{ route('customers.index') }}" class="btn btn-outline-secondary btn-sm rounded-3 px-4 py-2">
                            <i class="fas fa-arrow-left me-1"></i> Quay lại
                        </a>
                    </div>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('customers.update', $customer->customerId) }}" method="POST" class="needs-validation" novalidate>
                        @csrf
                        @method('PUT')
                        <div class="row g-4">
                            <!-- Name -->
                            <div class="col-md-6">
                                <label for="name" class="form-label fw-semibold text-dark">Tên khách hàng <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-user text-primary"></i></span>
                                    <input type="text" class="form-control shadow-none @error('name') is-invalid @enderror" 
                                           id="name" name="name" value="{{ old('name', $customer->name) }}" 
                                           placeholder="Nhập tên khách hàng" required autocomplete="off">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Email -->
                            <div class="col-md-6">
                                <label for="email" class="form-label fw-semibold text-dark">Email <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-envelope text-primary"></i></span>
                                    <input type="email" class="form-control shadow-none @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email', $customer->email) }}" 
                                           placeholder="Nhập email" required autocomplete="off">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Password (optional) -->
                            <div class="col-md-6">
                                <label for="password" class="form-label fw-semibold text-dark">Mật khẩu mới <span class="text-muted small">(nếu muốn đổi)</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-lock text-primary"></i></span>
                                    <input type="password" class="form-control shadow-none @error('password') is-invalid @enderror" 
                                           id="password" name="password"
                                           placeholder="Nhập mật khẩu mới" autocomplete="new-password">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-text text-secondary">Để trống nếu không đổi mật khẩu</div>
                            </div>
                            <!-- Gender -->
                            <div class="col-md-6">
                                <label for="gender" class="form-label fw-semibold text-dark">Giới tính <span class="text-danger">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-venus-mars text-primary"></i></span>
                                    <select class="form-select shadow-none @error('gender') is-invalid @enderror" id="gender" name="gender" required>
                                        <option value="Nam" {{ old('gender', $customer->gender) == 'Nam' ? 'selected' : '' }}>Nam</option>
                                        <option value="Nữ" {{ old('gender', $customer->gender) == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                                        <option value="Khác" {{ old('gender', $customer->gender) == 'Khác' ? 'selected' : '' }}>Khác</option>
                                    </select>
                                    @error('gender')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Ngày sinh -->
                            <div class="col-md-6">
                                <label for="dob" class="form-label fw-semibold text-dark">Ngày sinh</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-calendar-alt text-primary"></i></span>
                                    <input type="date" class="form-control shadow-none @error('dob') is-invalid @enderror" 
                                           id="dob" name="dob" value="{{ old('dob', $customer->dob) }}">
                                    @error('dob')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <!-- Số điện thoại -->
                            <div class="col-md-6">
                                <label for="phone" class="form-label fw-semibold text-dark">Số điện thoại</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-light"><i class="fas fa-phone text-primary"></i></span>
                                    <input type="text" class="form-control shadow-none @error('phone') is-invalid @enderror" 
                                           id="phone" name="phone" value="{{ old('phone', $customer->phone) }}" 
                                           placeholder="Nhập số điện thoại" maxlength="13">
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- Buttons -->
                        <div class="d-flex justify-content-end gap-3 mt-5 pt-3 border-top">
                            <a href="{{ route('customers.index') }}" class="btn btn-outline-secondary px-4 py-2 rounded-3">
                                <i class="fas fa-times me-2"></i> Hủy
                            </a>
                            <button type="submit" class="btn btn-warning px-4 py-2 rounded-3 shadow">
                                <i class="fas fa-save me-2"></i> Cập nhật
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
