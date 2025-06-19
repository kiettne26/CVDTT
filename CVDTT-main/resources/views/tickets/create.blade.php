@extends('CinemaMediator.admin')

@section('title', 'Thêm vé mới')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('asset/css/create.css') }}">
@endpush

@section('content')
<div class="container-fluid py-4 col-12 col-lg-8">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow-lg border-0" style="border-radius: 1.5rem;">
                <div class="card-header bg-white border-bottom-0 rounded-top-4 px-4 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 fw-bold text-primary">
                            <i class="bi bi-plus-circle me-2 text-success"></i>Thêm Vé Mới
                        </h3>
                        <a href="{{ route('tickets.index') }}" class="btn btn-outline-secondary btn-sm rounded-3 px-4 py-2">
                            <i class="bi bi-arrow-left me-1"></i> Quay lại
                        </a>
                    </div>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('tickets.store') }}" method="POST" class="row g-4">
                        @csrf

                        <div class="col-md-6">
                            <label for="movieId" class="form-label fw-semibold">Phim <span class="text-danger">*</span></label>
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
                            <label for="roomId" class="form-label fw-semibold">Phòng chiếu <span class="text-danger">*</span></label>
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

                        <div class="col-md-6">
                            <label for="showtimeId" class="form-label fw-semibold">Suất chiếu <span class="text-danger">*</span></label>
                            <select id="showtimeId" name="showtimeId" class="form-select @error('showtimeId') is-invalid @enderror" required>
                                <option value="">-- Chọn suất chiếu --</option>
                                @foreach($showtimes as $showtime)
                                <option value="{{ $showtime->showtimeId }}" {{ old('showtimeId') == $showtime->showtimeId ? 'selected' : '' }}>
                                    {{ $showtime->showtimeId }} -
                                    {{ $showtime->movie->title ?? '' }} | 
                                    {{ $showtime->date }} {{ $showtime->startTime }} | 
                                    {{ $showtime->screeningRoom->roomName ?? '' }}
                                </option>
                                @endforeach
                            </select>
                            @error('showtimeId')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="seatNumber" class="form-label fw-semibold">Số ghế <span class="text-danger">*</span></label>
                            <input type="text" id="seatNumber" name="seatNumber" class="form-control @error('seatNumber') is-invalid @enderror"
                                placeholder="Nhập số ghế (VD: A5, B10...)" value="{{ old('seatNumber') }}" required>
                            @error('seatNumber')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="price" class="form-label fw-semibold">Giá vé <span class="text-danger">*</span></label>
                            <input type="number" min="0" id="price" name="price" class="form-control @error('price') is-invalid @enderror"
                                placeholder="Nhập giá vé" value="{{ old('price') }}" required>
                            @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label for="status" class="form-label fw-semibold">Trạng thái <span class="text-danger">*</span></label>
                            <select id="status" name="status" class="form-select @error('status') is-invalid @enderror" required>
                                <option value="Còn trống" {{ old('status') == 'Còn trống' ? 'selected' : '' }}>Còn trống</option>
                                <option value="Đã đặt" {{ old('status') == 'Đã đặt' ? 'selected' : '' }}>Đã đặt</option>
                                <option value="Đã hủy" {{ old('status') == 'Đã hủy' ? 'selected' : '' }}>Đã hủy</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-12 text-end mt-3">
                            <button type="submit" class="btn btn-success px-4 py-2 fw-semibold">
                                <i class="bi bi-check-circle me-1"></i> Lưu vé
                            </button>
                            <a href="{{ route('tickets.index') }}" class="btn btn-secondary ms-2 px-4 py-2">
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
