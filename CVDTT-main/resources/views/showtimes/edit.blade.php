@extends('CinemaMediator.admin')

@section('title', 'Chỉnh sửa lịch chiếu')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
@endpush

@php
    use Carbon\Carbon;
@endphp

@section('content')
<div class="container-fluid">
    <div class="card-phim mx-auto" style="max-width: 650px;">
        <div class="fs-3 fw-bold text-primary mb-3">✏️ Sửa lịch chiếu</div>
        <form action="{{ route('showtimes.update', $showtime->showtimeId) }}" method="POST" class="row g-3 needs-validation" novalidate>
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Mã lịch chiếu</label>
                <input type="text" class="form-control" value="{{ $showtime->showtimeId }}" readonly>
            </div>
            <div class="mb-3">
                <label class="form-label">Mã phim</label>
                <select class="form-select" name="movieId" required>
                    <option value="">-- Chọn phim --</option>
                    @foreach($movies as $movie)
                        <option value="{{ $movie->movieId }}" {{ $showtime->movieId == $movie->movieId ? 'selected' : '' }}>
                            {{ $movie->movieId }} - {{ $movie->title }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Ngày chiếu</label>
                <input type="date" class="form-control" name="date"
                    value="{{ old('date', $showtime->date) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Giờ bắt đầu</label>
                <input type="time" class="form-control" name="startTime"
                    value="{{ old('startTime', \Carbon\Carbon::parse($showtime->startTime)->format('H:i')) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Mã phòng chiếu</label>
                <select class="form-select" name="roomId" required>
                    <option value="">-- Chọn phòng chiếu --</option>
                    @foreach($screeningrooms as $room)
                        <option value="{{ $room->roomId }}" {{ $showtime->roomId == $room->roomId ? 'selected' : '' }}>
                            {{ $room->roomId }} - {{ $room->roomName }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-between align-items-center mt-4">
                <a href="{{ route('showtimes.index') }}" class="btn btn-secondary px-4">
                    <i class="bi bi-arrow-left"></i> Quay lại
                </a>
                <button type="submit" class="btn btn-primary px-4">
                    <i class="bi bi-save"></i> Lưu thay đổi
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
