@extends('CinemaMediator.admin')
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link rel="stylesheet" href="{{ asset('asset/css/create.css') }}">
@endpush

@section('title', 'Chi tiết vé')

@section('content')
<div class="container-fluid py-4 col-12 col-lg-9">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card shadow-lg border-0" style="border-radius: 1.5rem;">
                <div class="card-header bg-white border-bottom-0 rounded-top-4 px-4 py-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mb-0 fw-bold text-primary">
                            <i class="fas fa-ticket-alt me-2 text-danger"></i>Chi tiết vé
                        </h3>
                        <a href="{{ route('tickets.index') }}" class="btn btn-outline-secondary btn-sm rounded-3 px-4 py-2">
                            <i class="fas fa-arrow-left me-1"></i> Quay lại
                        </a>
                    </div>
                </div>
                <div class="card-body p-4">
                    <div class="row g-4 align-items-center">
                        <!-- Icon vé -->
                        <div class="col-md-4 text-center mb-3 mb-md-0">
                            <div class="border rounded-3 p-5 text-muted bg-light d-flex flex-column align-items-center justify-content-center" style="height: 300px;">
                                <i class="fas fa-ticket-alt fa-6x mb-3 text-danger"></i>
                                <h5 class="mb-0 fw-bold text-primary">Vé số: #{{ $ticket->ticketId }}</h5>
                                <p class="mb-0 small text-muted">
                                    {{ $ticket->seatNumber ? 'Ghế ' . $ticket->seatNumber : '' }}
                                </p>
                                <p class="mb-0 small text-muted">
                                    {{ number_format($ticket->price, 0, ',', '.') }}₫
                                </p>
                            </div>
                        </div>
                        <!-- Thông tin -->
                        <div class="col-md-8">
                            <h2 class="fw-bold text-primary">Vé số #{{ $ticket->ticketId }}</h2>
                            <table class="table table-borderless mb-0">
                                <tr>
                                    <th class="fw-semibold text-dark w-30"><i class="fas fa-film me-2"></i>Phim:</th>
                                    <td>{{ $ticket->movie->title ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th class="fw-semibold text-dark"><i class="fas fa-door-open me-2"></i>Phòng chiếu:</th>
                                    <td>{{ $ticket->screeningRoom->roomName ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th class="fw-semibold text-dark"><i class="fas fa-calendar-alt me-2"></i>Suất chiếu:</th>
                                    <td>
                                        @if($ticket->showtime)
                                            {{ $ticket->showtime->date }} {{ $ticket->showtime->startTime }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th class="fw-semibold text-dark"><i class="fas fa-chair me-2"></i>Ghế:</th>
                                    <td>{{ $ticket->seatNumber }}</td>
                                </tr>
                                <tr>
                                    <th class="fw-semibold text-dark"><i class="fas fa-money-bill-wave me-2"></i>Giá vé:</th>
                                    <td>{{ number_format($ticket->price, 0, ',', '.') }}₫</td>
                                </tr>
                                <tr>
                                    <th class="fw-semibold text-dark"><i class="fas fa-info-circle me-2"></i>Trạng thái:</th>
                                    <td>
                                        @if($ticket->status == 'Còn trống')
                                            <span class="badge bg-success">{{ $ticket->status }}</span>
                                        @elseif($ticket->status == 'Đã đặt')
                                            <span class="badge bg-primary">{{ $ticket->status }}</span>
                                        @elseif($ticket->status == 'Đã hủy')
                                            <span class="badge bg-danger">{{ $ticket->status }}</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $ticket->status }}</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th class="fw-semibold text-dark"><i class="fas fa-clock me-2"></i>Ngày tạo:</th>
                                    <td>{{ $ticket->created_at ? $ticket->created_at->format('d/m/Y H:i') : 'N/A' }}</td>
                                </tr>
                            </table>
                            <div class="mt-4 d-flex gap-3">
                                <a href="{{ route('tickets.edit', $ticket->ticketId) }}" class="btn btn-warning px-4 py-2 rounded-3 shadow-sm d-flex align-items-center gap-2">
                                    <i class="fas fa-edit"></i> Sửa
                                </a>
                                <form action="{{ route('tickets.destroy', $ticket->ticketId) }}" method="POST" class="d-inline-block"
                                    onsubmit="return confirm('Bạn có chắc chắn muốn xoá vé này?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger px-4 py-2 rounded-3 shadow-sm d-flex align-items-center gap-2">
                                        <i class="fas fa-trash-alt"></i> Xoá
                                    </button>
                                </form>
                                <a href="{{ route('tickets.index') }}" class="btn btn-outline-secondary px-4 py-2 rounded-3 d-flex align-items-center gap-2">
                                    <i class="fas fa-list"></i> Danh sách vé
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
