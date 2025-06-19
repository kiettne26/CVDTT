@extends('CinemaMediator.admin')

@section('title', 'Chi tiết suất chiếu')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
@endpush

@section('content')
<div class="container py-4 col-12 col-lg-7">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-white rounded-top-4 px-4 py-3 d-flex justify-content-between align-items-center">
            <h3 class="mb-0 fw-bold text-primary">
                <i class="bi bi-info-circle text-info"></i> Thông tin suất chiếu
            </h3>
            <a href="{{ route('showtimes.index') }}" class="btn btn-outline-secondary btn-sm rounded-3 px-4 py-2">
                <i class="bi bi-arrow-left me-1"></i> Quay lại
            </a>
        </div>
        <div class="card-body p-4">
            <dl class="row mb-0">
                <dt class="col-sm-4">ID suất chiếu</dt>
                <dd class="col-sm-8">{{ $showtime->showtimeId }}</dd>

                <dt class="col-sm-4">Phim</dt>
                <dd class="col-sm-8">{{ $showtime->movie->title ?? $showtime->movieId }}</dd>

                <dt class="col-sm-4">Phòng chiếu</dt>
                <dd class="col-sm-8">{{ $showtime->screeningRoom->roomName ?? $showtime->roomId }}</dd>

                <dt class="col-sm-4">Ngày chiếu</dt>
                <dd class="col-sm-8">{{ $showtime->date }}</dd>

                <dt class="col-sm-4">Giờ bắt đầu</dt>
                <dd class="col-sm-8">{{ $showtime->startTime }}</dd>

                <dt class="col-sm-4">Giá vé</dt>
                <dd class="col-sm-8">{{ number_format($showtime->ticketPrice, 0, ',', '.') }}₫</dd>

                <dt class="col-sm-4">Tạo lúc</dt>
                <dd class="col-sm-8">{{ $showtime->created_at }}</dd>

                <dt class="col-sm-4">Cập nhật lúc</dt>
                <dd class="col-sm-8">{{ $showtime->updated_at }}</dd>
            </dl>
        </div>
    </div>
</div>
@endsection
