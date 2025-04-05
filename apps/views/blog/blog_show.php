<?php include __DIR__ . '/../shared/header.php'; ?>
<style>
    .custom-card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-label {
        font-weight: bold;
    }

    .tag-btn {
        margin: 5px;
    }

    .learnpress-card {
        background: linear-gradient(to right, #f4e4bc, #ffffff);
        border-radius: 15px;
        padding: 20px;
        position: relative;
        overflow: hidden;
    }

    .learnpress-card img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
    }

    .learnpress-card .badge {
        margin: 5px;
    }

    .learnpress-card .meta {
        color: #6c757d;
        font-size: 0.9rem;
    }

    .centered-img {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
</style>

<div class="container mt-4">
    <div class="row">
        <!-- Main Content with New LearnPress Section -->
        <div class="col-md-8">
            <h2 class="mb-4">Blog Posts</h2>
            <!-- New LearnPress Theme Collection Card -->
            <div class="card learnpress-card mb-4 custom-card">
                <img src="/search_helu_frontend/assets/images/study.png" class="card-img-top centered-img" alt="LearnPress Theme Collection" style="width: 500px; height: 400px;">
                <div class="card-body">
                    <h5 class="card-title">Best LearnPress WordPress Theme Collection For 2023</h5>
                    <div class="meta mb-2">By <span class="text-primary">Determined-poitras</span> | Jan 24, 2023 | 20 Comments</div>
                    <p class="card-text">Explore the top LearnPress WordPress themes for creating engaging e-learning platforms in 2023. Perfect for educators and LMS developers!</p>
                    <div>
                        <span class="badge bg-primary tag-btn">Free Courses</span>
                        <span class="badge bg-secondary tag-btn">Marketing</span>
                        <span class="badge bg-info tag-btn">Idea</span>
                        <span class="badge bg-warning tag-btn">LMS</span>
                        <span class="badge bg-success tag-btn">LearnPress</span>
                        <span class="badge bg-danger tag-btn">Instructor</span>
                    </div>
                </div>
            </div>

        </div>

        <!-- Sidebar -->
        <div class="col-md-4">
            <!-- Categories -->
            <div class="card mb-4">
                <div class="card-header">Categories</div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="#">Technology</a></li>
                    <li class="list-group-item"><a href="#">Marketing</a></li>
                    <li class="list-group-item"><a href="#">Education</a></li>
                    <li class="list-group-item"><a href="#">Finance</a></li>
                    <li class="list-group-item"><a href="#">Business</a></li>
                </ul>
            </div>

            <!-- Recent Posts -->
            <div class="card mb-4">
                <div class="card-header">Recent Posts</div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><a href="#">Best LearnPress WordPress Themes for 2025</a></li>
                    <li class="list-group-item"><a href="#">Top 10 Free WordPress Themes for 2025</a></li>
                    <li class="list-group-item"><a href="#">How to Build a Website in 2025</a></li>
                </ul>
            </div>

            <!-- Tags -->
            <div class="card mb-4">
                <div class="card-header">Tags</div>
                <div class="card-body">
                    <span class="badge bg-primary">WordPress</span>
                    <span class="badge bg-secondary">LMS</span>
                    <span class="badge bg-success">Education</span>
                    <span class="badge bg-danger">Themes</span>
                    <span class="badge bg-warning">Marketing</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Comments Section -->
    <div class="row mt-5">
        <div class="col-md-8">
            <h3>Comments</h3>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Zn9</h5>
                    <p class="card-text">Great article! Looking forward to more posts.</p>
                    <small class="text-muted">October 03, 2024</small>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title">Zn9</h5>
                    <p class="card-text">This was really helpful, thanks!</p>
                    <small class="text-muted">October 03, 2024</small>
                </div>
            </div>

            <!-- Comment Form -->
            <div class="card">
                <div class="card-body">
                    <h4>Leave a Comment</h4>
                    <form action="submit_comment.php" method="post">
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Comment</label>
                            <textarea class="form-control" id="comment" name="comment" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Post Comment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../shared/footer.php'; ?>