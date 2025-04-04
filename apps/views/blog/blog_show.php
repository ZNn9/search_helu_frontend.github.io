<?php include __DIR__ . '/../shared/header.php'; ?>

<body class="bg-light">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm p-4">
                    <!-- Tiêu đề bài viết -->
                    <h1 class="mb-3">Best LearnPress WordPress Theme Collection For 2023</h1>

                    <!-- Thông tin bài viết -->
                    <div class="blog-meta text-muted mb-3">
                        <span class="me-3"><i class="fas fa-user"></i> Determined-polaris</span>
                        <span class="me-3"><i class="fas fa-calendar-alt"></i> Jan 12, 2023</span>
                        <span><i class="fas fa-comments"></i> 20 Comments</span>
                    </div>

                    <!-- Ảnh bài viết -->
                    <img src="../images/home/study.png" alt="Blog Image" class="img-fluid rounded mb-4">

                    <!-- Nội dung bài viết -->
                    <div class="blog-content">
                        <p>This is a demo blog content. You can replace this with actual content later.</p>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="card shadow-sm p-4">
                    <h3 class="mb-3">Category</h3>
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item">Commercial (15)</li>
                        <li class="list-group-item">Office (15)</li>
                        <li class="list-group-item">Shop (15)</li>
                        <li class="list-group-item">Educate (15)</li>
                        <li class="list-group-item">Academy (15)</li>
                        <li class="list-group-item">Single family home (15)</li>
                    </ul>

                    <h3 class="mb-3">Recent Posts</h3>
                    <ul class="list-unstyled recent-posts mb-4">
                        <li class="d-flex align-items-center mb-2">
                            <img src="../images/blog/blog1.png" alt="Recent Post" class="me-2 rounded" width="50">
                            <span>Best LearnPress WordPress Theme Collection For 2025</span>
                        </li>
                        <li class="d-flex align-items-center mb-2">
                            <img src="../images/blog/blog2.png" alt="Recent Post" class="me-2 rounded" width="50">
                            <span>Best LearnPress Figma Theme Collection For 2025</span>
                        </li>
                        <li class="d-flex align-items-center">
                            <img src="../images/blog/blog3.png" alt="Recent Post" class="me-2 rounded" width="50">
                            <span>Best LearnPress WordPress Theme Collection For 2025</span>
                        </li>
                    </ul>

                    <h3 class="mb-3">Tags</h3>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge bg-primary">Free courses</span>
                        <span class="badge bg-secondary">Marketing</span>
                        <span class="badge bg-success">Idea</span>
                        <span class="badge bg-danger">LMS</span>
                        <span class="badge bg-warning text-dark">LearnPress</span>
                        <span class="badge bg-info text-dark">Instructor</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Điều hướng bài viết -->
        <div class="d-flex justify-content-between my-4">
            <a href="#" class="btn btn-outline-primary">← Prev Article</a>
            <a href="#" class="btn btn-outline-primary">Next Article →</a>
        </div>

        <!-- Bình luận -->
        <div class="card shadow-sm p-4">
            <h3 class="mb-3">20 Comments</h3>
            <div class="d-flex align-items-start mb-3">
                <img src="../images/user.png" alt="User" class="me-3 rounded-circle" width="50">
                <div>
                    <strong>John Doe</strong>
                    <p class="mb-0">This is a sample comment.</p>
                </div>
            </div>
            <div class="d-flex align-items-start">
                <img src="../images/user.png" alt="User" class="me-3 rounded-circle" width="50">
                <div>
                    <strong>Jane Doe</strong>
                    <p class="mb-0">Another sample comment.</p>
                </div>
            </div>
        </div>

        <!-- Form bình luận -->
        <div class="card shadow-sm p-4 mt-4">
            <h3 class="mb-3">Leave A Comment</h3>
            <form>
                <div class="mb-3">
                    <input type="text" class="form-control" placeholder="Name">
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" placeholder="Comment" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Post Comment</button>
            </form>
        </div>
    </div>
</body>

<?php include __DIR__ . '/../shared/footer.php'; ?>
