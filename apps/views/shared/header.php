<?php
require_once __DIR__ . '/../../controllers/accountController.php';
$accountController = new AccountController(); // Khởi tạo đối tượng AccountController

// Hàm lấy tên tài khoản từ AccountController
function getAccountName($accountController)
{
    return $accountController->getAccountName();
}

// Hàm lấy danh sách role từ AccountController
function getUserRoles($accountController)
{
    return $accountController->getUserRoles();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online School</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        .nav-link {
            color: black;
        }

        .nav-link.active {
            background-color: #6a11cb;
            color: white !important;
        }

        .search-bar {
            width: 250px;
        }

        /* Đảm bảo nội dung bên dưới navbar không bị che khuất */
        body {
            padding-top: 56px;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-white shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/search_helu_frontend/home">
                <img src="/search_helu_frontend/assets/icons/logo.png" alt="Logo" height="40">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/search_helu_frontend/home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/search_helu_frontend/course">Courses</a></li>
                    <li class="nav-item"><a class="nav-link" href="/search_helu_frontend/blog/show/1">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="/search_helu_frontend/admin">Dashboard</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">TikTok</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/search_helu_frontend/tiktok">Tiktok Home</a></li>
                            <li><a class="dropdown-item" href="/search_helu_frontend/tiktok/account">Tiktok Profile</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="nav-item d-flex align-items-center">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search for course" aria-label="Search">
                        <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                </div>
                <?php if ($accountController->isLoggedIn()): ?>
                    <div class="dropdown ms-3">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <?php echo htmlspecialchars(getAccountName($accountController)); ?>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li class="dropdown-item">
                                <div>
                                    <?php
                                    $roles = getUserRoles($accountController);
                                    if (is_array($roles) && !empty($roles)): ?>
                                        <?php foreach ($roles as $role): ?>
                                            <span class="badge bg-secondary me-1"><?php echo htmlspecialchars($role); ?></span>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <span class="text-muted">No roles available</span>
                                    <?php endif; ?>
                                </div>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="/search_helu_frontend/account/logout">Logout</a></li>
                        </ul>
                    </div>
                <?php else: ?>
                    <a class="btn btn-primary ms-3" href="/search_helu_frontend/account/login">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

</body>

</html>