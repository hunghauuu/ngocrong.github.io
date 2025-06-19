<div id="header" class="app-header">
    <div class="mobile-toggler">
        <button type="button" class="menu-toggler" data-toggle="sidebar-mobile">
            <span class="bar"></span>
            <span class="bar"></span>
        </button>
    </div>
    <div class="brand">
        <div class="desktop-toggler">
            <button type="button" class="menu-toggler" data-toggle="sidebar-minify">
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
        </div>
        <a href="/admin" class="brand-logo">
            <img src="<?php echo $setting['logo']; ?>" class="invert-dark"
                height="<?php echo $setting['size_logo']; ?>">
        </a>
    </div>
    <div class="menu">
        <form class="menu-search" method="POST" name="header_search_form">
            <div class="menu-search-icon"><i class="fa fa-search"></i></div>
            <div class="menu-search-input">
                <input type="text" class="form-control" placeholder="Search menu...">
            </div>
        </form>
        <div class="menu-item dropdown">
            <a href="#" data-bs-toggle="dropdown" data-display="static" class="menu-link">
                <div class="menu-icon"><i class="fa fa-bell nav-icon"></i></div>
                <div class="menu-label">3</div>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-notification">
                <h6 class="dropdown-header text-body-emphasis mb-1">Notifications</h6>
                <a href="#" class="dropdown-notification-item">
                    <div class="dropdown-notification-icon">
                        <i class="fa fa-receipt fa-lg fa-fw text-success"></i>
                    </div>
                    <div class="dropdown-notification-info">
                        <div class="title">Your store has a new order for 2 items totaling $1,299.00</div>
                        <div class="time">just now</div>
                    </div>
                    <div class="dropdown-notification-arrow">
                        <i class="fa fa-chevron-right"></i>
                    </div>
                </a>
                <a href="#" class="dropdown-notification-item">
                    <div class="dropdown-notification-icon">
                        <i class="far fa-user-circle fa-lg fa-fw text-muted"></i>
                    </div>
                    <div class="dropdown-notification-info">
                        <div class="title">3 new customer account is created</div>
                        <div class="time">2 minutes ago</div>
                    </div>
                    <div class="dropdown-notification-arrow">
                        <i class="fa fa-chevron-right"></i>
                    </div>
                </a>
                <a href="#" class="dropdown-notification-item">
                    <div class="dropdown-notification-icon">
                        <img src="assets/img/icon/android.svg" alt width="26">
                    </div>
                    <div class="dropdown-notification-info">
                        <div class="title">Your android application has been approved</div>
                        <div class="time">5 minutes ago</div>
                    </div>
                    <div class="dropdown-notification-arrow">
                        <i class="fa fa-chevron-right"></i>
                    </div>
                </a>
                <a href="#" class="dropdown-notification-item">
                    <div class="dropdown-notification-icon">
                        <img src="assets/img/icon/paypal.svg" alt width="26">
                    </div>
                    <div class="dropdown-notification-info">
                        <div class="title">Paypal payment method has been enabled for your store</div>
                        <div class="time">10 minutes ago</div>
                    </div>
                    <div class="dropdown-notification-arrow">
                        <i class="fa fa-chevron-right"></i>
                    </div>
                </a>
                <div class="p-2 text-center mb-n1">
                    <a href="#" class="text-body-emphasis text-opacity-50 text-decoration-none">See all</a>
                </div>
            </div>
        </div>
        <div class="menu-item dropdown">
            <a href="#" data-bs-toggle="dropdown" data-display="static" class="menu-link">
                <div class="menu-img online">
                    <img src="/assets/img/user/user.jpg" alt class="ms-100 mh-100 rounded-circle">
                </div>
                <div class="menu-text">
                    Cao Văn Huy
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end me-lg-3">
                <a class="dropdown-item d-flex align-items-center" href="profile.html">Edit Profile <i
                        class="fa fa-user-circle fa-fw ms-auto text-body text-opacity-50"></i></a>
                <a class="dropdown-item d-flex align-items-center" href="email_inbox.html">Inbox <i
                        class="fa fa-envelope fa-fw ms-auto text-body text-opacity-50"></i></a>
                <a class="dropdown-item d-flex align-items-center" href="calendar.html">Calendar <i
                        class="fa fa-calendar-alt fa-fw ms-auto text-body text-opacity-50"></i></a>
                <a class="dropdown-item d-flex align-items-center" href="settings.html">Setting <i
                        class="fa fa-wrench fa-fw ms-auto text-body text-opacity-50"></i></a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item d-flex align-items-center" href="page_login.html">Log Out <i
                        class="fa fa-toggle-off fa-fw ms-auto text-body text-opacity-50"></i></a>
            </div>
        </div>
    </div>
</div>
<div id="sidebar" class="app-sidebar">

    <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">

        <div class="menu">
            <div class="menu-header">MENU</div>
            <div class="menu-item">
                <a href="/admin" class="menu-link">
                    <span class="menu-icon"><i class="fa fa-home"></i></span>
                    <span class="menu-text">Trang chủ</span>
                </a>
            </div>
            <div class="menu-item">
                <a href="users-manager" class="menu-link">
                    <span class="menu-icon"><i class="fa fa-user"></i></span>
                    <span class="menu-text">Quản lý thành viên</span>
                </a>
            </div>

            <div class="menu-item">
                <a href="recharge" class="menu-link">
                    <span class="menu-icon"><i class="fa fa-dollar"></i></span>
                    <span class="menu-text">Quản lý thẻ nạp</span>
                </a>
            </div>

            <div class="menu-item">
                <a href="manager-post" class="menu-link">
                    <span class="menu-icon"><i class="fa fa-tag"></i></span>
                    <span class="menu-text">Quản lý bài viết</span>
                </a>
            </div>

            <div class="menu-item">
                <a href="admin-post" class="menu-link">
                    <span class="menu-icon"><i class="fa fa-check-square"></i></span>
                    <span class="menu-text">Quản lý thông báo</span>
                </a>
            </div>

            <div class="menu-item">
                <a href="giftcode" class="menu-link">
                    <span class="menu-icon"><i class="fa fa-bookmark"></i></span>
                    <span class="menu-text">Quản lý giftcode</span>
                </a>
            </div>

            <div class="menu-item">
                <a href="add-shop" class="menu-link">
                    <span class="menu-icon"><i class="fa fa-shopping-cart"></i></span>
                    <span class="menu-text">Quản lý shop</span>
                </a>
            </div>

            <div class="menu-item">
                <a href="download-manager" class="menu-link">
                    <span class="menu-icon"><i class="fa fa-download"></i></span>
                    <span class="menu-text">Quản lý link tải</span>
                </a>
            </div>

            <div class="menu-item">
                <a href="setting" class="menu-link">
                    <span class="menu-icon"><i class="fa fa-cogs"></i></span>
                    <span class="menu-text">Quản lý website</span>
                </a>
            </div>


            <div class="p-3 px-4 mt-auto hide-on-minified">
                <a href="/" class="btn btn-secondary d-block w-100 fw-600 rounded-pill">
                    <i class="fa fa-arrow-alt-circle-left me-1 ms-n1 opacity-5"></i> Quay Về
                </a>
            </div>
        </div>

    </div>
    <button class="app-sidebar-mobile-backdrop" data-dismiss="sidebar-mobile"></button>
</div>