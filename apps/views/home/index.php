<?php include __DIR__ . '/../shared/header.php'; ?>

<body>
    <!-- Hero Section -->
    <section class="bg-light text-center py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <h1 class="fw-bold">Build Skills With Online Course</h1>
                    <p class="lead">We showcase web righteous integrations and skills that are vital...</p>
                    <a href="#" class="btn btn-primary btn-lg">Push Content</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Top Categories -->
    <section class="container py-5">
        <h2 class="text-center mb-4">Top Categories</h2>
        <div class="row row-cols-2 row-cols-md-4 g-3">
            <?php
            $categories = ["Art & Design", "Development", "Communication", "Videography", "Photography", "Marketing", "Content Writing", "Finance"];
            foreach ($categories as $category) {
                ?>
                    <div class="col" type="submit" href="#"><div class="card p-3 text-center border-0 shadow-sm"><h5>$category</h5><p>39 Courses</p></div></div>
                <?php
            }
            ?>
        </div>
    </section>

    <!-- Featured Courses -->
    <section class="container py-5">
        <h2 class="text-center mb-4">Featured Courses</h2>
        <div class="row row-cols-1 row-cols-md-3 g-3">
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
    </section>

    <!-- LearnPress Add-Ons -->
    <section class="container text-center py-5">
        <div class="p-5 bg-gradient rounded text-white" style="background: linear-gradient(135deg, #ff758c, #ff7eb3);">
            <h3>Get More Power From LearnPress Add-Ons</h3>
            <p>The next level of LearnPress LMS WordPress Plugin...</p>
            <a href="#" class="btn btn-light btn-lg">Discover More</a>
        </div>
    </section>

    <!-- Stats -->
    <section class="container text-center py-5">
        <div class="row">
            <?php
            $stats = ["25K+ Active Students", "899 Total Courses", "158 Instructors", "100% Satisfaction Rate"];
            foreach ($stats as $stat) {
                echo "<div class='col-md-3'><h2 class='fw-bold'>$stat</h2></div>";
            }
            ?>
        </div>
    </section>

    <!-- Student Feedback -->
    <section class="container py-5">
        <h2 class="text-center mb-4">Student Feedbacks</h2>
        <div class="row row-cols-1 row-cols-md-3 g-3">
            <?php
            for ($i = 1; $i <= 3; $i++) {
                echo "<div class='col'>
                    <div class='card p-3 text-center border-0 shadow-sm'>
                        <blockquote class='blockquote mb-0'>
                            <p>“Great LMS platform, easy to use and very helpful.”</p>
                            <footer class='blockquote-footer'>Bao, Designer</footer>
                        </blockquote>
                        <a href='#' class='btn btn-outline-secondary mt-3'>See More Reviews</a>
                    </div>
                  </div>";
            }
            ?>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="container text-center py-5">
        <div class="p-4 bg-light rounded">
            <h3>Let's Start With Academy LMS</h3>
            <a href="#" class="btn btn-primary btn-lg">I'm a Student</a>
            <a href="#" class="btn btn-outline-primary btn-lg">Become An Instructor</a>
        </div>
    </section>

    <!-- Latest Articles -->
    <section class="container py-5">
        <h2 class="text-center mb-4">Latest Articles</h2>
        <div class="row row-cols-1 row-cols-md-3 g-3">
            <?php
            for ($i = 1; $i <= 3; $i++) {
                echo "<div class='col'>
                    <div class='card'>
                        <img src='https://via.placeholder.com/300x200' class='card-img-top' alt='Article Image'>
                        <div class='card-body'>
                            <h5 class='card-title'>Best LearnPress WordPress Themes</h5>
                            <p class='card-text'>Looking for an amazing & well-functional LearnPress...</p>
                            <a href='#' class='btn btn-outline-primary'>Read More</a>
                        </div>
                    </div>
                  </div>";
            }
            ?>
        </div>
    </section>

</body>


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