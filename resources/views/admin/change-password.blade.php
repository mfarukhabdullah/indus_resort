<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password | Indus Resort</title>
    <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <style>
        .password-container {
            max-width: 620px;
            padding: 28px;
        }
        .password-container h2 {
            margin: 0 0 6px;
            color: #173f35;
            font-size: 18px;
            display: flex;
            align-items: center;
            gap: 9px;
        }
        .password-container p.desc {
            color: #718096;
            font-size: 13px;
            margin: 0 0 22px;
        }
        .user-badge-box {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 16px;
            background: #f4f8f6;
            border: 1px solid #d5e6dc;
            border-radius: 8px;
            margin-bottom: 22px;
        }
        .user-badge-box i {
            font-size: 24px;
            color: #176044;
        }
        .user-badge-box div {
            display: grid;
            gap: 2px;
        }
        .user-badge-box strong {
            font-size: 13px;
            color: #173f35;
        }
        .user-badge-box span {
            font-size: 12px;
            color: #556b64;
        }
        .pwd-form {
            display: grid;
            gap: 18px;
        }
        .field-group {
            display: grid;
            gap: 7px;
        }
        .field-group label {
            font-size: 12.5px;
            font-weight: 700;
            color: #24433a;
        }
        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }
        .input-wrapper input {
            width: 100%;
            border: 1px solid #d7e1dc;
            border-radius: 7px;
            padding: 12px 42px 12px 14px;
            font: inherit;
            font-size: 13px;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .input-wrapper input:focus {
            border-color: #176044;
            outline: none;
            box-shadow: 0 0 0 3px rgba(23, 96, 68, 0.12);
        }
        .toggle-pwd {
            position: absolute;
            right: 12px;
            background: transparent;
            border: 0;
            color: #718096;
            font-size: 18px;
            cursor: pointer;
            padding: 4px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .toggle-pwd:hover {
            color: #176044;
        }
        .notice {
            padding: 12px 16px;
            border-radius: 7px;
            font-size: 13px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .notice.success {
            background: #eaf6ef;
            color: #0b6e48;
            border: 1px solid #bce1ce;
        }
        .notice.error {
            background: #fff4f4;
            color: #a42531;
            border: 1px solid #f2c7c7;
        }
        .save-pwd-btn {
            background: #176044;
            color: #fff;
            border: 0;
            border-radius: 7px;
            padding: 12px 22px;
            font-size: 13px;
            font-weight: 700;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 7px;
            width: max-content;
            margin-top: 6px;
            transition: background 0.2s;
        }
        .save-pwd-btn:hover {
            background: #0d4433;
        }
        .pwd-hints {
            margin: 0;
            padding: 0 0 0 18px;
            font-size: 11.5px;
            color: #718096;
            line-height: 1.6;
        }
    </style>
</head>
<body>
<div class="admin-shell">
    @include('admin.partials.sidebar', ['active' => 'change-password'])

    <main class="content">
        @include('admin.partials.topbar')

        <div class="page-title">
            <a href="{{ route('admin.login') }}"><i class="ri-arrow-left-line"></i> Back to Dashboard</a>
            <h1>Change Password</h1>
            <p>Update your admin panel login credentials to keep your website secure.</p>
        </div>

        <section class="panel password-container">
            <h2><i class="ri-shield-key-line"></i> Update Admin Password</h2>
            <p class="desc">Enter your current password followed by your new password.</p>

            @if(session('success'))
                <div class="notice success">
                    <i class="ri-checkbox-circle-line" style="font-size:18px"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="notice error">
                    <i class="ri-error-warning-line" style="font-size:18px"></i>
                    <div>
                        @foreach($errors->all() as $err)
                            <div>{{ $err }}</div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="user-badge-box">
                <i class="ri-user-settings-line"></i>
                <div>
                    <strong>Admin Account</strong>
                    <span>{{ $adminEmail }}</span>
                </div>
            </div>

            <form method="POST" action="{{ route('admin.change-password.update') }}" class="pwd-form">
                @csrf

                <div class="field-group">
                    <label for="current_password">Current Password</label>
                    <div class="input-wrapper">
                        <input type="password" id="current_password" name="current_password" required placeholder="Enter current password">
                        <button type="button" class="toggle-pwd" onclick="toggleVisibility('current_password', this)" aria-label="Show/Hide Password">
                            <i class="ri-eye-line"></i>
                        </button>
                    </div>
                </div>

                <div class="field-group">
                    <label for="password">New Password</label>
                    <div class="input-wrapper">
                        <input type="password" id="password" name="password" required minlength="6" placeholder="At least 6 characters">
                        <button type="button" class="toggle-pwd" onclick="toggleVisibility('password', this)" aria-label="Show/Hide Password">
                            <i class="ri-eye-line"></i>
                        </button>
                    </div>
                    <ul class="pwd-hints">
                        <li>Minimum 6 characters</li>
                    </ul>
                </div>

                <div class="field-group">
                    <label for="password_confirmation">Confirm New Password</label>
                    <div class="input-wrapper">
                        <input type="password" id="password_confirmation" name="password_confirmation" required minlength="6" placeholder="Re-enter new password">
                        <button type="button" class="toggle-pwd" onclick="toggleVisibility('password_confirmation', this)" aria-label="Show/Hide Password">
                            <i class="ri-eye-line"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="save-pwd-btn">
                    <i class="ri-lock-password-line"></i> Update Password
                </button>
            </form>
        </section>
    </main>
</div>

<script>
    const sidebar = document.getElementById('sidebar');
    const menuToggle = document.querySelector('.menu-toggle');
    const sidebarClose = document.querySelector('.sidebar-close');
    if (menuToggle && sidebar) menuToggle.onclick = () => sidebar.classList.add('open');
    if (sidebarClose && sidebar) sidebarClose.onclick = () => sidebar.classList.remove('open');

    function toggleVisibility(inputId, btn) {
        const input = document.getElementById(inputId);
        const icon = btn.querySelector('i');
        if (input.type === 'password') {
            input.type = 'text';
            icon.className = 'ri-eye-off-line';
        } else {
            input.type = 'password';
            icon.className = 'ri-eye-line';
        }
    }
</script>
</body>
</html>
