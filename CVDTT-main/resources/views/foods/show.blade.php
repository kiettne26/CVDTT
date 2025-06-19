@extends('CinemaMediator.admin')
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="{{ asset('asset/css/create.css') }}">
@endpush

@section('title', 'Chi tiết món ăn')

@section('content')
<div class="container-fluid py-4 col-12 col-lg-9">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow-lg border-0" style="border-radius: 1.5rem;">
                <div class="card-header bg-white border-bottom-0 rounded-top-4 px-4 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 fw-bold text-primary">
                            <i class="fas fa-hamburger me-2 text-warning"></i>Chi tiết món ăn
                        </h3>
                        <a href="{{ route('foods.index') }}" class="btn btn-outline-secondary btn-sm rounded-3 px-4 py-2">
                            <i class="fas fa-arrow-left me-1"></i> Quay lại
                        </a>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4 align-items-center">
                        <!-- Ảnh món ăn -->
                        <div class="col-md-4 text-center mb-3 mb-md-0">
                            <div class="border rounded-3 p-4 text-muted bg-light d-flex flex-column align-items-center justify-content-center" style="height: 300px;">
                                @if($food->poster)
                                    <img src="{{ asset($food->poster) }}" alt="{{ $food->name }}" class="img-fluid mb-3 rounded" style="max-height: 170px; object-fit: cover;">
                                @else
                                    <i class="fas fa-hamburger fa-6x mb-3 text-secondary"></i>
                                @endif
                                <h5 class="mb-0 fw-bold text-primary">{{ $food->name }}</h5>
                                <p class="mb-0 small text-muted">
                                    {{ number_format($food->price, 0, ',', '.') }}₫
                                </p>
                            </div>
                        </div>
                        <!-- Thông tin -->
                        <div class="col-md-8">
                            <h2 class="fw-bold text-primary">{{ $food->name }}</h2>
                            <table class="table table-borderless mb-0">
                                <tr>
                                    <th class="fw-semibold text-dark w-30"><i class="fas fa-money-bill-wave me-2"></i>Giá:</th>
                                    <td>{{ number_format($food->price, 0, ',', '.') }}₫</td>
                                </tr>
                                <tr>
                                    <th class="fw-semibold text-dark"><i class="fas fa-align-left me-2"></i>Mô tả:</th>
                                    <td>{{ $food->description }}</td>
                                </tr>
                                <tr>
                                    <th class="fw-semibold text-dark"><i class="fas fa-calendar-alt me-2"></i>Ngày thêm:</th>
                                    <td>{{ $food->created_at ? $food->created_at->format('d/m/Y H:i') : 'N/A' }}</td>
                                </tr>
                            </table>
                            <div class="mt-4 d-flex gap-3">
                                <a href="{{ route('foods.edit', $food->foodId) }}" class="btn btn-warning px-4 py-2 rounded-3 shadow-sm d-flex align-items-center gap-2">
                                    <i class="fas fa-edit"></i> Sửa
                                </a>
                                <form action="{{ route('foods.destroy', $food->foodId) }}" method="POST" class="d-inline-block"
                                    onsubmit="return confirm('Bạn có chắc chắn muốn xoá món ăn này?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger px-4 py-2 rounded-3 shadow-sm d-flex align-items-center gap-2">
                                        <i class="fas fa-trash-alt"></i> Xoá
                                    </button>
                                </form>
                                <a href="{{ route('foods.index') }}" class="btn btn-outline-secondary px-4 py-2 rounded-3 d-flex align-items-center gap-2">
                                    <i class="fas fa-list"></i> Danh sách món ăn
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
