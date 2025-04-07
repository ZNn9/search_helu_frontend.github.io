<?php include __DIR__ . '/../shared/header.php'; ?>

<!-- Main Content -->
<div class="container my-5">
    <div class="row">
        <!-- Course List -->
        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>All Courses</h2>
                <!-- <div class="d-flex align-items-center">
                    <form class="d-flex" action="/search_helu_frontend/course" method="GET">
                        <input type="text" class="form-control me-2" name="query" placeholder="Search for course" value="<?= htmlspecialchars($_GET['query'] ?? '') ?>">
                        <button class="btn btn-outline-secondary" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                </div> -->
            </div>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <?php if (!empty($courses)): ?>
                    <?php foreach ($courses as $course): ?>
                        <div class="col">
                            <div class="card h-100 border-0 shadow-sm rounded-3">
                                <img src="assets/images/study.png" class="card-img-top rounded-top" alt="<?= htmlspecialchars($course['courseName']) ?>" style="height: 180px; object-fit: cover;">
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($course['courseName']) ?></h5>
                                    <p class="card-text"><?= htmlspecialchars($course['description']) ?></p>
                                    <p class="card-text">
                                        <span class="badge bg-info text-dark">Views: <?= htmlspecialchars($course['quantityView']) ?></span>
                                        <span class="badge bg-info text-dark">Favorites: <?= htmlspecialchars($course['quantityFavorite']) ?></span>
                                    </p>
                                    <a href="/search_helu_frontend/course/show/<?= htmlspecialchars($course['idCourse']) ?>" class="btn btn-primary btn-sm">View More</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p class="text-center text-muted">No courses found for your search.</p>
                <?php endif; ?>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-3">
            <h5>Course Category</h5>
            <div class="list-group overflow-auto" style="max-height: 600px;">
                <?php
                $categories = ["Commercial", "Office", "Shop", "Educate", "Academy", "Single family home", "Studio", "University"];
                foreach ($categories as $category): ?>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <input class="form-check-input me-1" type="checkbox" value="">
                        <label class="form-check-label"><?= $category ?></label>
                        <span class="badge bg-primary rounded-pill">15</span>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../shared/footer.php'; ?>