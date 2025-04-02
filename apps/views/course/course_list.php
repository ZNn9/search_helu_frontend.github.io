<?php include __DIR__ . '/../shared/header.php'; ?>

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Course</a></li>
            <li class="breadcrumb-item active" aria-current="page">The Ultimate Guide to the Best WordPress LMS Plugin</li>
        </ol>
    </div>
</nav>

<!-- Main Content -->
<div class="container my-5">
    <div class="row">
        <!-- Course List -->
        <div class="col-lg-9">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>All Courses</h2>
                <div class="d-flex align-items-center">
                    <input type="text" class="form-control me-2" placeholder="Search">
                    <button class="btn btn-outline-secondary"><i class="bi bi-search"></i></button>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                <?php
                $coursesPerPage = 6;
                $totalCourses = 30; // Example total number of courses
                $totalPages = ceil($totalCourses / $coursesPerPage);

                // Get the current page from URL, default to 1 if not set
                $currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $currentPage = max(1, min($currentPage, $totalPages)); // Ensure the page is within range

                $startCourse = ($currentPage - 1) * $coursesPerPage;
                $endCourse = min($startCourse + $coursesPerPage, $totalCourses);

                for ($i = $startCourse + 1; $i <= $endCourse; $i++) { ?>
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm rounded-3">
                            <img src="course1.jpg" class="card-img-top rounded-top" alt="Course 1" style="height: 180px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">Create An LMS Website With LearnPress</h5>
                                <p class="card-text"><small class="text-muted">by Determined Poltras</small></p>
                                <p class="card-text">
                                    <span class="badge bg-info text-dark">2 Weeks</span>
                                    <span class="badge bg-info text-dark">150 Students</span>
                                    <span class="badge bg-info text-dark">All Levels</span>
                                    <span class="badge bg-info text-dark">20 Lessons</span>
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="text-warning">★★★★☆</span>
                                    </div>
                                    <span class="badge bg-success">Free</span>
                                </div>
                                <div class="mt-2">
                                    <button class="btn btn-outline-primary btn-sm me-2 btn-favorite" data-course="course<?= $i ?>"><i class="bi bi-heart"></i></button>
                                    <button class="btn btn-outline-warning btn-sm ms-2 btn-save" data-course="course<?= $i ?>"><i class="bi bi-bookmark"></i></button>
                                    <a href="#" class="btn btn-primary btn-sm ms-2">View More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <!-- Pagination Controls -->
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center mt-4">
                    <li class="page-item <?= ($currentPage == 1) ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $currentPage - 1 ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php for ($page = 1; $page <= $totalPages; $page++) { ?>
                        <li class="page-item <?= ($page == $currentPage) ? 'active' : '' ?>">
                            <a class="page-link" href="?page=<?= $page ?>"><?= $page ?></a>
                        </li>
                    <?php } ?>
                    <li class="page-item <?= ($currentPage == $totalPages) ? 'disabled' : '' ?>">
                        <a class="page-link" href="?page=<?= $currentPage + 1 ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Sidebar -->
        <div class="col-lg-3">
            <h5>Course Category</h5>
            <div class="list-group overflow-auto" style="max-height: 600px;">
                <?php
                $categories = ["Commercial", "Office", "Shop", "Educate", "Academy", "Single family home", "Studio", "University"];
                foreach ($categories as $category) { ?>
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <input class="form-check-input me-1" type="checkbox" value="">
                        <label class="form-check-label"><?= $category ?></label>
                        <span class="badge bg-primary rounded-pill">15</span>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../shared/footer.php'; ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.querySelectorAll(".btn-favorite").forEach(button => {
            let courseId = button.dataset.course;
            if (localStorage.getItem(courseId) === "true") {
                button.classList.add("btn-danger");
                button.innerHTML = '<i class="bi bi-heart-fill"></i>';
            }

            button.addEventListener("click", function() {
                let isFavorite = localStorage.getItem(courseId) === "true";
                localStorage.setItem(courseId, isFavorite ? "false" : "true");
                button.classList.toggle("btn-danger", !isFavorite);
                button.innerHTML = isFavorite ? '<i class="bi bi-heart"></i>' : '<i class="bi bi-heart-fill"></i>';
            });
        });

        document.querySelectorAll(".btn-save").forEach(button => {
            let courseId = button.dataset.course;
            button.addEventListener("click", function() {
                alert(`Course ${courseId} saved!`);
            });
        });
    });
</script>