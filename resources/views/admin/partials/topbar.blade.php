<header class="topbar">
    <button class="menu-toggle" aria-label="Open menu"><i class="ri-menu-line"></i></button>

    @if(!isset($hideSearch) || !$hideSearch)
        <label class="search">
            <i class="ri-search-line"></i>
            <input type="search" placeholder="Search rooms, gallery, settings..." aria-label="Search">
        </label>
    @else
        <div style="flex:1"></div>
    @endif

    <div class="top-actions">
        <!-- Messages Notification Icon -->
        <a class="icon-btn notification" aria-label="Messages" href="{{ route('admin.messages') }}" title="View Messages">
            <i class="ri-notification-3-line"></i>
            <span class="notification-badge"></span>
        </a>

        <!-- User Profile Pill & Dropdown -->
        <div class="user-menu-wrapper" id="userMenuWrapper">
            <div class="user-profile-pill" id="userMenuBtn" role="button" tabindex="0" aria-haspopup="true" aria-expanded="false" aria-label="Admin Profile Menu">
                <div class="user-avatar">AR</div>
                <div class="user-info">
                    <strong class="user-name">Admin</strong>
                    <span class="user-role">Super Admin</span>
                </div>
                <i class="ri-arrow-down-s-line user-caret"></i>
            </div>

            <div class="user-dropdown-menu" id="userDropdownMenu">
                <div class="dropdown-header">
                    <strong>Indus Resort Admin</strong>
                    <small>admin@indusresort.com</small>
                </div>
                <a href="{{ route('admin.change-password') }}" class="dropdown-item">
                    <i class="ri-lock-password-line"></i> Change Password
                </a>
                <a href="{{ route('admin.messages') }}" class="dropdown-item">
                    <i class="ri-message-3-line"></i> Messages
                </a>
                <a href="{{ url('/') }}" target="_blank" class="dropdown-item">
                    <i class="ri-external-link-line"></i> View Live Website
                </a>
                <hr class="dropdown-divider">
                <form method="POST" action="{{ route('admin.logout') }}" style="margin:0">
                    @csrf
                    <button type="submit" class="dropdown-item logout-item">
                        <i class="ri-logout-box-r-line"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>

<script>
    (function(){
        const wrapper = document.getElementById('userMenuWrapper');
        const btn = document.getElementById('userMenuBtn');
        if (btn && wrapper) {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                wrapper.classList.toggle('active');
            });
            document.addEventListener('click', function(e) {
                if (!wrapper.contains(e.target)) {
                    wrapper.classList.remove('active');
                }
            });
        }
    })();
</script>
