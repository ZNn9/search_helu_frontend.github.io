<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Kaiadmin - Bootstrap 5 Admin Dashboard</title>
  <meta
    content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
    name="viewport" />
  <link
    rel="icon"
    href="/search_helu_frontend/assets/kaiadmin-lite-1.2.0/assets/img/kaiadmin/favicon.ico"
    type="image/x-icon" />

  <!-- Fonts and icons -->
  <script src="/search_helu_frontend/assets/kaiadmin-lite-1.2.0/assets/js/plugin/webfont/webfont.min.js"></script>
  <script>
    WebFont.load({
      google: {
        families: ["Public Sans:300,400,500,600,700"]
      },
      custom: {
        families: [
          "Font Awesome 5 Solid",
          "Font Awesome 5 Regular",
          "Font Awesome 5 Brands",
          "simple-line-icons",
        ],
        urls: ["/search_helu_frontend/assets/kaiadmin-lite-1.2.0/assets/css/fonts.min.css"],
      },
      active: function() {
        sessionStorage.fonts = true;
      },
    });
  </script>
  <!-- Bootstrap CSS -->

  <!-- CSS Files -->
  <link rel="stylesheet" href="/search_helu_frontend/assets/kaiadmin-lite-1.2.0/assets/css/bootstrap.min.css" />
  <link rel="stylesheet" href="/search_helu_frontend/assets/kaiadmin-lite-1.2.0/assets/css/plugins.min.css" />
  <link rel="stylesheet" href="/search_helu_frontend/assets/kaiadmin-lite-1.2.0/assets/css/kaiadmin.min.css" />

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link rel="stylesheet" href="/search_helu_frontend/assets/kaiadmin-lite-1.2.0/assets/css/demo.css" />

  <!-- Custom CSS -->
  <style>
    /* Highlight parent link */
    .nav-link.active {
      background-color: #1d3557;
      color: #fff;
    }

    /* Highlight child link */
    .child-link.active {
      background-color: #457b9d;
      color: #fff;
      padding-left: 20px;
    }
  </style>
</head>

<body>
  <div class="wrapper ">
    <!-- Sidebar -->
    <div class="sidebar" data-background-color="dark">
      <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
          <a href="/search_helu_frontend/home" class="logo">
            <img
              src="/search_helu_frontend/assets/kaiadmin-lite-1.2.0/assets/img/kaiadmin/logo_light.svg"
              alt="navbar brand"
              class="navbar-brand"
              height="20" />
          </a>
          <div class="nav-toggle">
            <button class="btn btn-toggle toggle-sidebar">
              <i class="gg-menu-right"></i>
            </button>
            <button class="btn btn-toggle sidenav-toggler">
              <i class="gg-menu-left"></i>
            </button>
          </div>
          <button class="topbar-toggler more">
            <i class="gg-more-vertical-alt"></i>
          </button>
        </div>
        <!-- End Logo Header -->
      </div>
      <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
          <ul class="nav nav-secondary">
            <li class="nav-item">
              <a href="/search_helu_frontend/admin">
                <i class="fas fa-home"></i>
                <p>Dashboard</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="/search_helu_frontend/admin/search">
                <i class="fas fa-home"></i>
                <p>Search Advanced</p>
                <span class=""></span>
              </a>
            </li>
            <li class="nav-section">
              <span class="sidebar-mini-icon">
                <i class="fa fa-ellipsis-h"></i>
              </span>
              <h4 class="text-section">Components</h4>
            </li>
            <?php
            // Xác định path hiện tại
            $currentPath = $_SERVER['REQUEST_URI'];

            // Kiểm tra từng trang con
            $isLesson = strpos($currentPath, 'listlesson') !== false;
            $isCourses = strpos($currentPath, 'listcourses') !== false;
            $isAccount = strpos($currentPath, 'listaccount') !== false;

            // Nếu đang ở trang con nào đó thì mở menu cha "Account"
            $isAccountSection = $isLesson || $isCourses || $isAccount;
            ?>

            <li class="nav-item">
              <a data-bs-toggle="collapse" href="#base1" <?php if ($isAccountSection) echo 'aria-expanded="true"'; ?>>
                <i class="fas fa-layer-group"></i>
                <p>Account</p>
                <span class="caret"></span>
              </a>
              <div class="collapse <?php echo $isAccountSection ? 'show' : ''; ?>" id="base1">
                <ul class="nav nav-collapse">
                  <li>
                    <a href="/search_helu_frontend/admin/listaccount" class="<?php echo $isAccount ? 'active' : ''; ?>">
                      <span class="sub-item">List Account</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a data-bs-toggle="collapse" href="#base2">
                <i class="fas fa-layer-group"></i>
                <p>Course</p>
                <span class="caret"></span>
              </a>
              <div class="collapse" id="base2">
                <ul class="nav nav-collapse">
                  <li>
                    <a href="/search_helu_frontend/admin/listcourses" class="<?php echo $isCourses ? 'active' : ''; ?>">
                      <span class="sub-item">List Courses</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item">
              <a data-bs-toggle="collapse" href="#base3">
                <i class="fas fa-layer-group"></i>
                <p>Lesson</p>
                <span class="caret"></span>
              </a>
              <div class="collapse" id="base3">
                <ul class="nav nav-collapse">
                  <li>
                    <a href="/search_helu_frontend/admin/listlesson" class="<?php echo $isLesson ? 'active' : ''; ?>">
                      <span class="sub-item">List lesson</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- End Sidebar -->

    <div class="main-panel">
      <div class="main-header">
        <div class="main-header-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="index.html" class="logo">
              <img
                src="/search_helu_frontend/assets/kaiadmin-lite-1.2.0/assets/img/kaiadmin/logo_light.svg"
                alt="navbar brand"
                class="navbar-brand"
                height="20" />
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <?php include __DIR__ . '/../shared/header.php'; ?>
        <!-- End Navbar -->
      </div>
</body>