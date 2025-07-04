<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CineTech</title>
  <!-- CSS chính -->
  <link rel="stylesheet" href="{{ asset('TC/style.css') }}">
  <!-- Font Awesome cho icon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
  <!-- HEADER -->
  <header class="site-header">
    <div class="container header-inner">
      <div class="logo">
        <img src="{{ asset('TC/images/logo.png') }}" alt="CineTech Logo">
      </div>
      <div class="search-bar">
        <input type="text" placeholder="Tìm kiếm phim........">
        <i class="fas fa-search"></i>
      </div>
      <nav class="main-nav">
        <ul>
          <li><a href="#">PHIM</a></li>
          <li><a href="#">RẠP CHIẾU PHIM</a></li>
          <li><a href="#">TIN TỨC</a></li>
          <li><a href="#">QUY ĐỊNH</a></li>
        </ul>
      </nav>
      <div class="user-actions">
        <i class="fas fa-user-circle fa-2x"></i>
        <div class="lang-switch">
          <button class="active">VN</button>
          <button>EN</button>
        </div>
      </div>
    </div>
  </header>

  <!-- CAROUSEL -->
  <div class="carousel">
    <i class="fas fa-chevron-left arrow arrow-left"></i>
    <div class="carousel-inner">
      <img src="{{ asset('TC/images/anh1.webp') }}" alt="Banner phim">
    </div>
    <i class="fas fa-chevron-right arrow arrow-right"></i>
  </div>

  <main class="container">
    <!-- PHIM ĐANG CHIẾU -->
    <section class="movies-section">
      <h2>PHIM ĐANG CHIẾU</h2>
      <div class="movie-wrapper">
        <div class="movie-list">
          <div class="movie-card">
            <img src="{{ asset('TC/images/trangquynh.jpg') }}" alt="Trạng quỳnh">
            <h3 class="movie-title">Trạng quỳnh</h3>
            <p class="movie-info">Thời lượng: 131p</p>
            <p class="movie-info">Ngày khởi chiếu: 25/01/2025</p>
            <button class="btn-book">ĐẶT VÉ</button>
          </div>
          <div class="movie-card">
            <img src="{{ asset('TC/images/bogia.jpg') }}" alt="Bố già">
            <h3 class="movie-title">Bố già</h3>
            <p class="movie-info">Thời lượng: 131p</p>
            <p class="movie-info">Ngày khởi chiếu: 25/05/2025</p>
            <button class="btn-book">ĐẶT VÉ</button>
          </div>
          <div class="movie-card">
            <img src="{{ asset('TC/images/songlang.png') }}" alt="Song lang">
            <h3 class="movie-title">Song lang</h3>
            <p class="movie-info">Thời lượng: 172p</p>
            <p class="movie-info">Ngày khởi chiếu: 14/01/2025</p>
            <button class="btn-book">ĐẶT VÉ</button>
          </div>
          <div class="movie-card">
            <img src="{{ asset('TC/images/chietyeu.jpg') }}" alt="Chiết yêu">
            <h3 class="movie-title">Chiết yêu</h3>
            <p class="movie-info">Thời lượng: 111p</p>
            <p class="movie-info">Ngày khởi chiếu: 21/04/2025</p>
            <button class="btn-book">ĐẶT VÉ</button>
          </div>
          <div class="movie-card">
            <img src="{{ asset('TC/images/nvcc.jpg') }}" alt="Người vợ cuối cùng">
            <h3 class="movie-title">Người vợ cuối cùng</h3>
            <p class="movie-info">Thời lượng: 121p</p>
            <p class="movie-info">Ngày khởi chiếu: 31/05/2025</p>
            <button class="btn-book">ĐẶT VÉ</button>
          </div>
          <div class="movie-card">
            <img src="{{ asset('TC/images/chuyentinh.jpg') }}" alt="Chuyện tình ngày xưa">
            <h3 class="movie-title">Chuyện tình ngày xưa</h3>
            <p class="movie-info">Thời lượng: 117p</p>
            <p class="movie-info">Ngày khởi chiếu: 29/03/2025</p>
            <button class="btn-book">ĐẶT VÉ</button>
          </div>
        </div>
        <i class="fas fa-chevron-right section-arrow section-arrow-right"></i>
      </div>
    </section>

    <!-- PHIM SẮP CHIẾU -->
    <section class="movies-section">
      <h2>PHIM SẮP CHIẾU</h2>
      <div class="movie-wrapper">
        <div class="movie-list">
          <div class="movie-card">
            <img src="{{ asset('TC/images/lio.jpeg') }}" alt="Lilo và Stitch">
            <h3 class="movie-title">Lilo và Stitch</h3>
            <p class="movie-info">Thời lượng: 131p</p>
            <p class="movie-info">Ngày khởi chiếu: 25/09/2025</p>
          </div>
          <div class="movie-card">
            <img src="{{ asset('TC/images/bklr.jpg') }}" alt="Bí kíp luyện rồng">
            <h3 class="movie-title">Bí kíp luyện rồng</h3>
            <p class="movie-info">Thời lượng: 125p</p>
            <p class="movie-info">Ngày khởi chiếu: 13/06/2025</p>
          </div>
          <div class="movie-card">
            <img src="{{ asset('TC/images/thamtu.jpg') }}" alt="Thám tử kiên">
            <h3 class="movie-title">Thám tử kiên</h3>
            <p class="movie-info">Thời lượng: 162p</p>
            <p class="movie-info">Ngày khởi chiếu: 15/10/2025</p>
          </div>
          <div class="movie-card">
            <img src="{{ asset('TC/images/quycau.jpg') }}" alt="Quỷ cẩu">
            <h3 class="movie-title">Quỷ cẩu</h3>
            <p class="movie-info">Thời lượng: 123p</p>
            <p class="movie-info">Ngày khởi chiếu: 31/10/2025</p>
          </div>
          <div class="movie-card">
            <img src="{{ asset('TC/images/snow.jpg') }}" alt="Snow White">
            <h3 class="movie-title">Snow White</h3>
            <p class="movie-info">Thời lượng: 125p</p>
            <p class="movie-info">Ngày khởi chiếu: 09/09/2025</p>
          </div>
          <div class="movie-card">
            <img src="{{ asset('TC/images/emma.jpg') }}" alt="Emma">
            <h3 class="movie-title">Emma</h3>
            <p class="movie-info">Thời lượng: 130p</p>
            <p class="movie-info">Ngày khởi chiếu: 27/11/2025</p>
          </div>
        </div>
        <i class="fas fa-chevron-right section-arrow section-arrow-right"></i>
      </div>
    </section>
  </main>

  <!-- POPUP LỊCH CHIẾU -->
  <div class="modal-overlay">
    <div class="modal">
      <span class="close-btn"><i class="fas fa-times"></i></span>
      <div class="modal-header">
        <h2>Lịch chiếu Trạng Quỳnh</h2>
        <div class="dropdown">
          <select id="cinema-select">
            <option disabled selected>Chọn rạp</option>
            <option>CineTech Tây Sơn</option>
            <option>CineTech Xuân Thủy</option>
            <option>CineTech Mỹ Đình</option>
            <option>CineTech Phạm Ngọc Thạch</option>
            <option>CineTech Vũ Phạm Hàm</option>
            <option>CineTech Thanh Xuân</option>
            <option>CineTech Nguyễn Chí Thanh</option>
          </select>
        </div>
      </div>
      <div class="date-selector">
        <div class="arrow arrow-left"><i class="fas fa-chevron-left"></i></div>
        <div class="date-list">
          <div class="date-item active"><div class="day">1/6</div><div class="label">Hôm nay</div></div>
          <div class="date-item"><div class="day">2/6</div><div class="label">Thứ tư</div></div>
          <div class="date-item"><div class="day">3/6</div><div class="label">Thứ năm</div></div>
          <div class="date-item"><div class="day">4/6</div><div class="label">Thứ sáu</div></div>
          <div class="date-item"><div class="day">5/6</div><div class="label">Thứ bảy</div></div>
          <div class="date-item"><div class="day">6/6</div><div class="label">Chủ nhật</div></div>
          <div class="date-item"><div class="day">7/6</div><div class="label">Thứ hai</div></div>
        </div>
        <div class="arrow arrow-right"><i class="fas fa-chevron-right"></i></div>
      </div>
      <div class="separator"></div>
      <div class="screening-type">2D Phụ Đề</div>
      <div class="time-slots">
        <div class="time-slot">16:15 ~ 18:00</div>
        <div class="time-slot">18:30 ~ 20:15</div>
        <div class="time-slot">20:45 ~ 22:30</div>
      </div>
      <div class="screening-type">2D Lồng Tiếng</div>
      <div class="time-slots">
        <div class="time-slot">16:00 ~ 17:45</div>
        <div class="time-slot">18:15 ~ 20:00</div>
        <div class="time-slot">20:30 ~ 22:15</div>
      </div>
    </div>
  </div>
  
  <!-- JS mở/đóng popup -->
  <script src="{{ asset('TC/script.js') }}"></script>
</body>
</html>
