@extends('CinemaMediator.admin')
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="{{ asset('asset/css/create.css') }}">
@endpush

@section('title', 'Chi tiết khách hàng')

@section('content')
<div class="container-fluid py-4 col-12 col-lg-9">
    <div class="row justify-content-center">
        <div class="col-12">    
            <div class="card shadow-lg border-0" style="border-radius: 1.5rem;">
                <div class="card-header bg-white border-bottom-0 rounded-top-4 px-4 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 fw-bold text-primary">
                            <i class="fas fa-user me-2 text-success"></i>Chi tiết khách hàng
                        </h3>
                        <a href="{{ route('customers.index') }}" class="btn btn-outline-secondary btn-sm rounded-3 px-4 py-2">
                            <i class="fas fa-arrow-left me-1"></i> Quay lại
                        </a>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4 align-items-center">
                        <!-- Icon avatar -->
                        <div class="col-md-4 text-center mb-3 mb-md-0">
                            <div class="border rounded-3 p-5 text-muted bg-light d-flex flex-column align-items-center justify-content-center" style="height: 300px;">
                                <i class="fas fa-user-circle fa-6x mb-3 text-secondary"></i>
                                <h5 class="mb-0 fw-bold text-primary">{{ $customer->name }}</h5>
                                <p class="mb-0 small text-muted">{{ $customer->email }}</p>
                            </div>
                        </div>
                        <!-- Info -->
                        <div class="col-md-8">
                            <h2 class="fw-bold text-primary">{{ $customer->name }}</h2>
                            <table class="table table-borderless mb-0">
                                <tr>
                                    <th class="fw-semibold text-dark w-30"><i class="fas fa-envelope me-2"></i>Email:</th>
                                    <td>{{ $customer->email }}</td>
                                </tr>
                                <tr>
                                    <th class="fw-semibold text-dark"><i class="fas fa-venus-mars me-2"></i>Giới tính:</th>
                                    <td>{{ $customer->gender }}</td>
                                </tr>
                                <tr>
                                    <th class="fw-semibold text-dark"><i class="fas fa-calendar-alt me-2"></i>Ngày sinh:</th>
                                    <td>{{ $customer->dob }}</td>
                                </tr>
                                <tr>
                                    <th class="fw-semibold text-dark"><i class="fas fa-phone me-2"></i>Số điện thoại:</th>
                                    <td>{{ $customer->phone }}</td>
                                </tr>
                            </table>
                            <div class="mt-4 d-flex gap-3">
                                <a href="{{ route('customers.edit', $customer->customerId) }}" class="btn btn-warning px-4 py-2 rounded-3 shadow-sm d-flex align-items-center gap-2">
                                    <i class="fas fa-edit"></i> Sửa
                                </a>
                                <form action="{{ route('customers.destroy', $customer->customerId) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Bạn có chắc chắn muốn xoá khách hàng này?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger px-4 py-2 rounded-3 shadow-sm d-flex align-items-center gap-2">
                                        <i class="fas fa-trash-alt"></i> Xoá
                                    </button>
                                </form>
                                <a href="{{ route('customers.index') }}" class="btn btn-outline-secondary px-4 py-2 rounded-3 d-flex align-items-center gap-2">
                                    <i class="fas fa-list"></i> Danh sách khách hàng
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </div>
</div>
@endsection
