<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập / Đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f3f6fb; min-height: 100vh; }
        .auth-bg { position: fixed; top:0; left:0; width:100vw; height:100vh; object-fit: cover; z-index:0; opacity: .20; }
        .auth-card { max-width: 410px; width: 100%; z-index: 1; background: #fff; border-radius: 1.5rem; box-shadow: 0 8px 40px #1a37604a; padding: 2.2rem 2rem;}
        .auth-logo { width: 88px; }
        .social-btn img { width: 28px; }
        .nav-tabs .nav-link.active { font-weight: bold; background: #f3f6fb; border: none; border-bottom: 2px solid #1565c0; color: #1565c0 !important;}
        .nav-tabs .nav-link { border: none; color: #888; }
    </style>
</head>
<body>
    <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=1500&q=80"
         alt="background" class="auth-bg d-none d-md-block">
    <div class="d-flex align-items-center justify-content-center min-vh-100 position-relative">
        <div class="auth-card mx-auto">
            <div class="text-center mb-4">
                <img src="https://cdn-icons-png.flaticon.com/512/3177/3177440.png"
                    alt="Logo" class="auth-logo mb-2">
                <h3 class="fw-bold mb-0">Chào mừng bạn!</h3>
                <div class="text-muted mb-1 fs-6">Đăng nhập hoặc tạo tài khoản mới</div>
            </div>

            <!-- Tabs -->
            <ul class="nav nav-tabs nav-justified mb-3" id="authTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="login-tab" data-bs-toggle="tab"
                            data-bs-target="#login" type="button" role="tab">Đăng nhập</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="register-tab" data-bs-toggle="tab"
                            data-bs-target="#register" type="button" role="tab">Đăng ký</button>
                </li>
            </ul>

            <div class="tab-content">
                <!-- Đăng nhập -->
                <div class="tab-pane fade show active" id="login" role="tabpanel">
                    @if($errors->has('login'))
                        <div class="alert alert-danger py-2 small">{{ $errors->first('login') }}</div>
                    @endif
                    <form method="POST" action="{{ route('login.process') }}" class="d-flex flex-column gap-3">
                        @csrf
                        <div>
                            <input type="email" name="email" class="form-control rounded-3 p-2"
                                   placeholder="Nhập email của bạn" value="{{ old('email') }}" required autofocus>
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control rounded-3 p-2"
                                   placeholder="Mật khẩu của bạn" required>
                        </div>
                        <div class="d-flex justify-content-between align-items-center mt-1">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                                <label class="form-check-label small" for="remember">Ghi nhớ mật khẩu</label>
                            </div>
                            <a href="#" class="small text-decoration-none text-primary">Quên mật khẩu?</a>
                        </div>
                        <button type="submit" class="btn btn-primary rounded-3 fw-bold py-2 mt-2">Đăng nhập</button>
                    </form>
                    <div class="my-3 text-center text-muted small d-flex align-items-center justify-content-center">
                        <hr class="flex-grow-1 mx-2" style="opacity:0.25;">
                        <span>Hoặc đăng nhập với</span>
                        <hr class="flex-grow-1 mx-2" style="opacity:0.25;">
                    </div>
                    <div class="d-flex justify-content-center gap-3 mb-1">
                        <a href="#" class="btn btn-light border rounded-circle shadow-sm p-2 social-btn" title="Đăng nhập bằng Facebook">
                            <img src="https://cdn-icons-png.flaticon.com/512/124/124010.png" alt="Facebook">
                        </a>
                        <a href="#" class="btn btn-light border rounded-circle shadow-sm p-2 social-btn" title="Đăng nhập bằng Google">
                            <img src="https://cdn-icons-png.flaticon.com/512/2991/2991148.png" alt="Google">
                        </a>
                    </div>
                </div>

                <!-- Đăng ký -->
                <div class="tab-pane fade" id="register" role="tabpanel">
                    @if($errors->has('register'))
                        <div class="alert alert-danger py-2 small">{{ $errors->first('register') }}</div>
                    @endif
                    <form method="POST" action="{{ route('register.process') }}" class="d-flex flex-column gap-3">
                        @csrf
                        <div>
                            <input type="text" name="name" class="form-control rounded-3 p-2"
                                   placeholder="Họ tên của bạn" value="{{ old('name') }}" required>
                        </div>
                        <div>
                            <input type="email" name="email" class="form-control rounded-3 p-2"
                                   placeholder="Email của bạn" value="{{ old('email') }}" required>
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <span class="small">Giới tính:</span>
                            <div class="form-check mb-0">
                                <input class="form-check-input" type="radio" name="gender" id="gender-male" value="Nam" checked>
                                <label class="form-check-label small" for="gender-male">Nam</label>
                            </div>
                            <div class="form-check mb-0">
                                <input class="form-check-input" type="radio" name="gender" id="gender-female" value="Nữ">
                                <label class="form-check-label small" for="gender-female">Nữ</label>
                            </div>
                            <div class="form-check mb-0">
                                <input class="form-check-input" type="radio" name="gender" id="gender-other" value="Khác">
                                <label class="form-check-label small" for="gender-other">Khác</label>
                            </div>
                        </div>
                        <div>
                            <label for="birthday" class="small mb-1">Ngày sinh:</label>
                            <input type="date" name="birthday" id="birthday" class="form-control rounded-3 p-2" value="{{ old('birthday') }}" required>
                        </div>
                        <div>
                            <input type="password" name="password" id="reg-password"
                                   class="form-control rounded-3 p-2"
                                   placeholder="Mật khẩu của bạn" minlength="6" required>
                        </div>
                        <div>
                            <input type="password" name="password_confirmation" id="reg-password-confirm"
                                   class="form-control rounded-3 p-2"
                                   placeholder="Nhập lại mật khẩu" minlength="6" required>
                            <span id="passwordMismatch" class="text-danger small" style="display:none;">Mật khẩu không khớp</span>
                        </div>
                        <button type="submit" class="btn btn-primary rounded-3 fw-bold py-2 mt-2">Đăng ký</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Kiểm tra xác nhận mật khẩu
        document.addEventListener('DOMContentLoaded', function () {
            const password = document.getElementById('reg-password');
            const passwordConfirm = document.getElementById('reg-password-confirm');
            const mismatch = document.getElementById('passwordMismatch');
            if (password && passwordConfirm && mismatch) {
                passwordConfirm.addEventListener('input', function () {
                    if (password.value !== passwordConfirm.value) {
                        mismatch.style.display = 'block';
                    } else {
                        mismatch.style.display = 'none';
                    }
                });
                password.addEventListener('input', function () {
                    if (password.value !== passwordConfirm.value && passwordConfirm.value.length > 0) {
                        mismatch.style.display = 'block';
                    } else {
                        mismatch.style.display = 'none';
                    }
                });
            }
        });
    </script>
</body>
</html>
