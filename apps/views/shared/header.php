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
        .nav-link { color: black; }
        .nav-link.active { background-color: #6a11cb; color: white !important; }
        .search-bar { width: 250px; }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="/search_helu_frontend/home"><img src="logo.png" alt="Logo" height="40"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/search_helu_frontend/home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/search_helu_frontend/course">Courses</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Page</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Page 1</a></li>
                            <li><a class="dropdown-item" href="#">Page 2</a></li>
                        </ul>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                </ul>
                <div class="nav-item">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search for course" aria-label="Search">
                            <button class="btn btn-outline-secondary" type="submit" ><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                <a class="btn btn-primary ms-3" href="/search_helu_frontend/account/login">Login</a>
            </div>
        </div>
    </nav>
</body>
</html>