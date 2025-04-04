<?php include __DIR__ . '/../shared/header.php'; ?>

<!-- Main Content -->
<div class="container-fluid p-0">
    <div class="row g-0">
        <?php include __DIR__ . '/../shared/left_body.php'; ?>

        <!-- Main Content -->
        <div class="col-md-7" style="margin-left: 16.666667%; padding: 0;">
            <div class="row g-0">
                <!-- Video 1 -->
                <div class="col-12 mb-4">
                    <div class="card border-0 shadow-lg rounded-3 overflow-hidden">
                        <img src="video1.jpg" class="card-img-top" alt="Video 1" style="height: 400px; object-fit: cover; transition: transform 0.3s;">
                        <div class="card-body p-3 bg-gradient" style="background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);">
                            <h6 class="card-title text-white mb-2">Username</h6>
                            <p class="card-text text-white-50 mb-2">Video description...</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex gap-3">
                                    <span class="text-white"><i class="bi bi-heart-fill text-danger"></i> 74.1K</span>
                                    <span class="text-white"><i class="bi bi-chat-fill text-primary"></i> 12.3K</span>
                                </div>
                                <button class="btn btn-outline-light btn-sm rounded-pill">Follow</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Video 2 -->
                <div class="col-12 mb-4">
                    <div class="card border-0 shadow-lg rounded-3 overflow-hidden">
                        <img src="video2.jpg" class="card-img-top" alt="Video 2" style="height: 400px; object-fit: cover; transition: transform 0.3s;">
                        <div class="card-body p-3 bg-gradient" style="background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);">
                            <h6 class="card-title text-white mb-2">kurgusoff</h6>
                            <p class="card-text text-white-50 mb-2">STRING THEORY...</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex gap-3">
                                    <span class="text-white"><i class="bi bi-heart-fill text-danger"></i> 2.7K</span>
                                    <span class="text-white"><i class="bi bi-chat-fill text-primary"></i> 456</span>
                                </div>
                                <button class="btn btn-outline-light btn-sm rounded-pill">Follow</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Video 3 -->
                <div class="col-12 mb-4">
                    <div class="card border-0 shadow-lg rounded-3 overflow-hidden">
                        <img src="video3.jpg" class="card-img-top" alt="Video 3" style="height: 400px; object-fit: cover; transition: transform 0.3s;">
                        <div class="card-body p-3 bg-gradient" style="background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);">
                            <h6 class="card-title text-white mb-2">discovery</h6>
                            <p class="card-text text-white-50 mb-2">70.7K likes...</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex gap-3">
                                    <span class="text-white"><i class="bi bi-heart-fill text-danger"></i> 70.7K</span>
                                    <span class="text-white"><i class="bi bi-chat-fill text-primary"></i> 1.2K</span>
                                </div>
                                <button class="btn btn-outline-light btn-sm rounded-pill">Follow</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar Right -->
        <div class="col-md-3 bg-light border-start" style="position: fixed; right: 0; top: 56px; bottom: 0; overflow-y: auto;">
            <div class="p-3">
                <h6 class="mb-3 text-dark fw-bold">Suggestions for you</h6>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="#" class="text-decoration-none text-dark">inder...</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none text-dark">organic_sj...</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none text-dark">mr_gr...</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none text-dark">alw922...</a></li>
                    <li class="mb-2"><a href="#" class="text-decoration-none text-dark">sakib...</a></li>
                </ul>
                <p class="text-muted small mt-4">About Help API Privacy Terms Contact Upload Language Meta verified © 2023 TikTok from Meta</p>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../shared/footer.php'; ?>

<style>
    .card-img-top:hover {
        transform: scale(1.05);
    }
    .card-body {
        position: absolute;
        bottom: 0;
        width: 100%;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
        color: white;
    }
    .btn-outline-light {
        border-color: white;
        color: white;
    }
    .btn-outline-light:hover {
        background-color: white;
        color: #6a11cb;
    }
    .suggestion-item {
        transition: all 0.3s ease;
    }
    .suggestion-item:hover {
        background-color: #f8f9fa;
        border-radius: 0.25rem;
    }
</style>