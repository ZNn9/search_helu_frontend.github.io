
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reusable Bootstrap 5.3 UI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">MyApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                </ul>
            </div>
        </div>
    </nav>

// sidebar.php
<div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 250px; height: 100vh;">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item"><a href="#" class="nav-link active">Dashboard</a></li>
        <li><a href="#" class="nav-link">Settings</a></li>
    </ul>
</div>

// footer.php
<footer class="bg-dark text-white text-center py-3 mt-4">
    <p>&copy; 2025 MyApp. All rights reserved.</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

// index.php
<?php include 'header.php'; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <?php include 'sidebar.php'; ?>
        </div>
        <div class="col-md-9 p-4">
            <h1>Welcome to MyApp</h1>
            <p>This is a simple reusable UI layout using Bootstrap 5.3.0.</p>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
