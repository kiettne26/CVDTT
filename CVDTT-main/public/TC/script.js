// script.js
// Logic xử lý popup lịch chiếu, chọn giờ, và giao diện đặt ghế

document.addEventListener('DOMContentLoaded', () => {
  // 1. Khởi tạo các phần tử DOM
  const overlay         = document.querySelector('.modal-overlay');
  const closeBtn        = overlay.querySelector('.close-btn');
  const bookButtons     = document.querySelectorAll('.btn-book');
  const timeSlots       = document.querySelectorAll('.time-slot');
  const seatSelection   = document.getElementById('seat-selection');
  const seatGrid        = document.getElementById('ss-grid');
  const backButton      = document.getElementById('ss-back');
  const chosenSeatsText = document.getElementById('chosen-seats');
  const subtotalText    = document.getElementById('subtotal');

  // 2. Cấu hình giá vé và danh sách ghế đã chọn
  const pricePerSeat = 80000; // 80.000₫/ghế
  let chosenSeats = [];

  // 3. Mở popup lịch chiếu khi nhấn ĐẶT VÉ
  bookButtons.forEach(btn => {
    btn.addEventListener('click', () => overlay.classList.add('active'));
  });

  // 4. Đóng popup khi nhấn X hoặc click ra ngoài
  closeBtn.addEventListener('click', () => overlay.classList.remove('active'));
  overlay.addEventListener('click', e => {
    if (e.target === overlay) overlay.classList.remove('active');
  });

  // 5. Sinh tự động lưới ghế (A1 → A14, … I1 → I14)
  (function generateSeats() {
    const rows = ['A','B','C','D','E','F','G','H','I'];
    rows.forEach(row => {
      for (let i = 1; i <= 14; i++) {
        const seatId = `${row}${i}`;
        const seatEl = document.createElement('div');
        seatEl.classList.add('seat');
        seatEl.dataset.seat = seatId;
        seatEl.textContent = seatId;
        // Ví dụ đánh dấu ghế đã đặt sẵn:
        // if (['A4','C6','E2','E3','E4'].includes(seatId)) {
        //   seatEl.classList.add('reserved');
        // }
        seatGrid.appendChild(seatEl);
      }
    });
  })();

  // 6. Xử lý chọn khung giờ
  timeSlots.forEach(slot => {
    slot.addEventListener('click', () => {
      // Highlight khung giờ được chọn
      timeSlots.forEach(s => s.classList.remove('active'));
      slot.classList.add('active');
      // Chuyển giao diện: ẩn popup, hiện chọn ghế
      overlay.classList.remove('active');
      seatSelection.classList.remove('hidden');
    });
  });

  // 7. Xử lý chọn/bỏ chọn ghế
  seatGrid.addEventListener('click', e => {
    const seatEl = e.target;
    if (!seatEl.classList.contains('seat') || seatEl.classList.contains('reserved')) return;

    const id = seatEl.dataset.seat;
    const isSelected = seatEl.classList.toggle('selected');
    if (isSelected) {
      chosenSeats.push(id);
    } else {
      chosenSeats = chosenSeats.filter(s => s !== id);
    }

    // Cập nhật thông tin phía dưới
    chosenSeatsText.textContent = chosenSeats.join(', ') || '–';
    subtotalText.textContent    = (chosenSeats.length * pricePerSeat).toLocaleString() + '₫';
  });

  // 8. Nút QUAY LẠI từ giao diện đặt ghế về popup lịch chiếu
  backButton.addEventListener('click', () => {
    seatSelection.classList.add('hidden');
    overlay.classList.add('active');
  });
});
