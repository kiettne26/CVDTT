@extends('CinemaMediator.admin')

@section('title', 'Danh sách vé')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
@endpush

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

@section('content')
<div class="container-fluid">
    <div class="card-phim">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="fs-3 fw-bold text-primary">🎟️ Danh sách vé</div>
            <a href="{{ route('tickets.create') }}">
                <button class="btn btn-add d-flex align-items-center gap-2 px-3 py-2 text-white shadow-sm">
                    <i class="bi bi-plus-circle"></i> Thêm vé
                </button>
            </a>
        </div>
        <div class="table-responsive">
            <table class="table align-middle table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Mã vé</th>
                        <th>Tên phim</th>
                        <th>Phòng chiếu</th>
                        <th>Suất chiếu</th>
                        <th>Ghế</th>
                        <th>Giá</th>
                        <th>Trạng thái</th>
                        <th class="text-center">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($tickets as $ticket)
                    <tr>
                        <td class="fw-bold">{{ $loop->iteration }}</td>
                        <td>{{ $ticket->ticketId }}</td>
                        <td>{{ $ticket->movie->title ?? '-' }}</td>
                        <td>{{ $ticket->screeningRoom->roomName ?? '-' }}</td>
                        <td>
                            @if(isset($ticket->showtime))
                                {{ $ticket->showtime->date ?? '' }}<br>
                                <small>{{ $ticket->showtime->startTime ?? '' }}</small>
                            @else
                                -
                            @endif
                        </td>
                        <td class="fw-semibold">{{ $ticket->seatNumber }}</td>
                        <td class="fw-bold text-danger">{{ number_format($ticket->price, 0, ',', '.') }}₫</td>
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
                        <td class="text-center">
                            <a href="{{ route('tickets.show', $ticket->ticketId) }}"
                                class="btn btn-info btn-sm align-middle d-inline-flex align-items-center gap-1 shadow-sm px-3">
                                <i class="bi bi-eye"></i> Xem
                            </a>
                            <a href="{{ route('tickets.edit', $ticket->ticketId) }}"
                                class="btn btn-warning btn-sm align-middle d-inline-flex align-items-center gap-1 shadow-sm px-3">
                                <i class="bi bi-pencil-square"></i> Sửa
                            </a>
                            <form action="{{ route('tickets.destroy', $ticket->ticketId) }}" method="POST"
                                class="d-inline-block align-middle form-delete"
                                data-ticket="{{ $ticket->ticketId }}"
                                style="margin-left: 4px;">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                    class="btn btn-danger btn-sm align-middle d-inline-flex align-items-center gap-1 shadow-sm px-3 btn-confirm-delete"
                                    data-ticket="{{ $ticket->ticketId }}">
                                    <i class="bi bi-trash"></i> Xoá
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">
                            <div class="alert alert-info my-3 text-center">Không có vé nào!</div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Xác Nhận Xoá -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="deleteModalLabel">Xác nhận xoá</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Đóng"></button>
      </div>
      <div class="modal-body">
        <span>Bạn có chắc chắn muốn xoá vé: <span class="fw-bold" id="deleteTicketName"></span>?</span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Huỷ</button>
        <button type="button" class="btn btn-danger" id="btnModalDelete">Xoá</button>
      </div>
    </div>
  </div>
</div>

@if (session('mess_success'))
    <div id="toast">
        <div class="message message--success">
            <div class="message__icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#47d864"
                    class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0m-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                </svg>
            </div>
            <div class="message__body">
                <h3 class="message__title mb-0">{{ session('mess_success') }}</h3>
            </div>
            <div class="message__close" onclick="this.closest('#toast').remove()">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-x-lg"
                    viewBox="0 0 16 16">
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/>
                </svg>
            </div>
        </div>
    </div>
    <script>
        setTimeout(() => { document.getElementById('toast')?.remove(); }, 3500);
    </script>
@endif

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Modal xác nhận xoá
    let formDelete = null;
    document.querySelectorAll('.btn-confirm-delete').forEach(btn => {
        btn.addEventListener('click', function() {
            formDelete = this.closest('form');
            document.getElementById('deleteTicketName').textContent = btn.getAttribute('data-ticket');
            let modal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
            modal.show();
        });
    });

    document.getElementById('btnModalDelete').addEventListener('click', function() {
        if(formDelete) formDelete.submit();
    });
});
</script>
@endpush

@endsection
