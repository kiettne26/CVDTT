<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="format-detection" content="telephone=no" />
    <base href="" />
    <title>@yield('title', 'Trang quản trị')</title>
    
    <!-- Preload CSS -->
    <link rel="preload" href="{{ asset('asset/css/vendor.min.css') }}?v=1.0.0" as="style" />
    <link rel="preload" href="{{ asset('asset/css/layout.css') }}" as="style" />
    <link rel="preload" href="{{ asset('asset/css/media-screen.css') }}" as="style" />
    
    <!-- CSS -->
    <link href="{{ asset('asset/css/vendor.min.css') }}?v=1.0.0" rel="stylesheet" />
    <link href="{{ asset('asset/css/layout.css') }}" rel="stylesheet" />
    <link href="{{ asset('asset/css/media-screen.css') }}" rel="stylesheet" />
    
    @yield('head')
    @stack('styles')
    
    <!-- Preload JS -->
    <link rel="preload" href="https://cdn.jsdelivr.net/npm/bootstrap@5.x/dist/js/bootstrap.bundle.min.js" as="script" />
    <link rel="preload" href="{{ asset('asset/js/vendor.min.js') }}" as="script" />
    <link rel="preload" href="{{ asset('asset/js/utils.js') }}" as="script" />
</head>

<body class="admin-layout">
    <div class="container-fluid p-0">
        <div class="row g-0 px-3 px-md-4 pt-4">
            <!-- BEGIN: Sidebar -->
            <aside class="col-4 col-md-2 ps-0 container-fluid border-end sidebar">
                <div class="d-grid gap-1 h-100 d-flex flex-column">
                    <!-- Logo -->
                    <div class="sidebar-logo text-center py-3">
                        <img src="{{ asset('Anh/Logo.jpg') }}" alt="Logo" class="img-fluid" style="max-height: 150px;">
                    </div>

                    <!-- Navigation -->
                    <nav class="sidebar-nav flex-grow-1">
                        <ul class="list-unstyled ps-0 mb-0">
                            <li id="home" class="nav-item">
                                <a href="{{ route('home') }}" class="nav-link text-black p-2 d-flex w-100">
                                    <i class="bi bi-house-door me-2"></i> Trang chủ
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <div class="accordion accordion-flush" id="adminMenuAccordion">
                                    <div class="accordion-item border-0">
                                        <div class="accordion-header">
                                            <button class="accordion-button collapsed p-2 d-flex align-items-center gap-2 text-black" 
                                                    type="button" 
                                                    data-bs-toggle="collapse" 
                                                    data-bs-target="#adminMenuCollapse"
                                                    aria-expanded="false" 
                                                    aria-controls="adminMenuCollapse">
                                                <i class="bi bi-gear me-2"></i> Quản lý
                                            </button>
                                        </div>
                                        
                                        <div id="adminMenuCollapse" class="accordion-collapse collapse" data-bs-parent="#adminMenuAccordion">
                                            <ul class="accordion-body pe-0 pb-0 pt-1 list-unstyled">
                                                <li id="customers" class="nav-item">
                                                    <a href="" class="nav-link text-black p-2 d-flex w-100">
                                                        <i class="bi bi-people me-2"></i> Khách hàng
                                                    </a>
                                                </li>
                                                <li id="movies" class="nav-item">
                                                    <a href="{{ route('movies.index') }}" class="nav-link text-black p-2 d-flex w-100">
                                                        <i class="bi bi-film me-2"></i> Phim
                                                    </a>
                                                </li>
                                                <li id="foods" class="nav-item">
                                                    <a href="" class="nav-link text-black p-2 d-flex w-100">
                                                        <i class="bi bi-cup-hot me-2"></i> Đồ ăn
                                                    </a>
                                                </li>
                                                <li id="showtimes" class="nav-item">
                                                    <a href="" class="nav-link text-black p-2 d-flex w-100">
                                                        <i class="bi bi-calendar-event me-2"></i> Lịch chiếu
                                                    </a>
                                                </li>
                                                <li id="screeningrooms" class="nav-item">
                                                    <a href="" class="nav-link text-black p-2 d-flex w-100">
                                                        <i class="bi bi-building me-2"></i> Phòng chiếu
                                                    </a>
                                                </li>
                                                <li id="tickets" class="nav-item">
                                                    <a href="" class="nav-link text-black p-2 d-flex w-100">
                                                        <i class="bi bi-ticket-perforated me-2"></i> Vé
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </nav>

                    <!-- User Account -->
                    <div class="sidebar-user mt-auto mb-3">
                        <div class="dropdown w-100">
                            <button class="btn btn-light border dropdown-toggle w-100 d-flex align-items-center justify-content-between"
                                    type="button" 
                                    data-bs-toggle="dropdown" 
                                    aria-expanded="false">
                                <div class="d-flex align-items-center">
                                    <img src="{{ url('images/avatauser.png') }}" alt="Avatar" class="avatar-admin me-2">
                                </div>
                                <span class="text-truncate" style="max-width: 120px;">{{ Auth::user()->name ?? 'Admin' }}</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <form method="POST" action="" id="logoutForm" class="d-none">
                                        @csrf
                                    </form>
                                    <button class="dropdown-item" type="button" onclick="confirmLogout()">
                                        <i class="bi bi-box-arrow-right me-2"></i> Đăng xuất
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </aside>
            <!-- END: Sidebar -->

            <!-- Main Content -->
            <main class="col bg-white rounded-4 shadow-sm p-4 min-vh-100 main-content">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.x/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('asset/js/vendor.min.js') }}"></script>
    <script src="{{ asset('asset/js/utils.js') }}"></script>
    <script src="{{ asset('asset/js/chart.min.js') }}"></script>
    <script src="{{ asset('asset/js/script.js') }}"></script>
    <script src="{{ asset('asset/jquery-3.7.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <script>
        // Active menu item highlighting
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            const menuItems = document.querySelectorAll('.nav-item');
            
            menuItems.forEach(item => {
                const link = item.querySelector('a');
                if (link && link.getAttribute('href') === currentPath) {
                    item.classList.add('active');
                }
            });
        });

        // Logout confirmation
        function confirmLogout() {
            Swal.fire({
                title: 'Bạn muốn đăng xuất?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Xác nhận',
                cancelButtonText: 'Hủy',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logoutForm').submit();
                }
            });
        }

        // Text truncation
        $(document).ready(function() {
            $(".cut_text").each(function() {
                const text = $(this).text().trim();
                if (text.length > 20) {
                    $(this).text(text.substring(0, 50) + '...');
                }
            });
        });
    </script>
    
    @yield('script')
    @stack('scripts')
</body>
</html>