@extends('CinemaMediator.admin')

@section('title', 'Thêm lịch chiếu')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('asset/css/create.css') }}">
@endpush
@php
use Carbon\Carbon;
@endphp


@section('content')
<div class="container-fluid py-4 col-12 col-lg-8">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow-lg border-0" style="border-radius: 1.5rem;">
                <div class="card-header bg-white border-bottom-0 rounded-top-4 px-4 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 fw-bold text-primary">
                            <i class="bi bi-plus-circle me-2 text-success"></i>Thêm Lịch Chiếu Mới
                        </h3>
                        <a href="{{ route('showtimes.index') }}" class="btn btn-outline-secondary btn-sm rounded-3 px-4 py-2">
                            <i class="bi bi-arrow-left me-1"></i> Quay lại
                        </a>
                    </div>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('showtimes.store') }}" method="POST" class="row g-4">
                        @csrf


                        <div class="col-md-6">
                            <label for="movieId" class="form-label fw-semibold">Mã phim <span class="text-danger">*</span></label>
                            <select id="movieId" name="movieId" class="form-select @error('movieId') is-invalid @enderror" required>
                                <option value="">-- Chọn phim --</option>
                                @foreach($movies as $movie)
                                <option value="{{ $movie->movieId }}" {{ old('movieId') == $movie->movieId ? 'selected' : '' }}>
                                    {{ $movie->movieId }} - {{ $movie->title }}
                                </option>
                                @endforeach
                            </select>
                            @error('movieId')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="date" class="form-label fw-semibold">Ngày chiếu <span class="text-danger">*</span></label>
                            <input type="date" id="date" name="date"
                                class="form-control @error('date') is-invalid @enderror"
                                value="{{ old('date', Carbon::now()->format('Y-m-d')) }}" required>
                            @error('date')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="startTime" class="form-label fw-semibold">Giờ bắt đầu <span class="text-danger">*</span></label>
                            <input type="time" id="startTime" name="startTime"
                                class="form-control @error('startTime') is-invalid @enderror"
                                value="{{ old('startTime', isset($showtime) ? \Carbon\Carbon::parse($showtime->startTime)->format('H:i') : \Carbon\Carbon::now()->format('H:i')) }}"
                                required>
                            @error('startTime')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>

                        <div class="col-md-6">
                            <label for="roomId" class="form-label fw-semibold">Mã phòng chiếu <span class="text-danger">*</span></label>
                            <select id="roomId" name="roomId" class="form-select @error('roomId') is-invalid @enderror" required>
                                <option value="">-- Chọn phòng --</option>
                                @foreach($screeningrooms as $room)
                                <option value="{{ $room->roomId }}" {{ old('roomId') == $room->roomId ? 'selected' : '' }}>
                                    {{ $room->roomId }} - {{ $room->roomName }}
                                </option>
                                @endforeach
                            </select>
                            @error('roomId')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 text-end mt-3">
                            <button type="submit" class="btn btn-success px-4 py-2 fw-semibold">
                                <i class="bi bi-check-circle me-1"></i> Lưu lịch chiếu
                            </button>
                            <a href="{{ route('showtimes.index') }}" class="btn btn-secondary ms-2 px-4 py-2">
                                <i class="bi bi-x-lg me-1"></i> Huỷ
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection