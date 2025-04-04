<?php include __DIR__ . '/../shared/header.php'; ?>

<!-- Breadcrumb -->
<nav aria-label="breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Course</a></li>
            <li class="breadcrumb-item active" aria-current="page">The Ultimate Guide to The Best WordPress LMS Plugin</li>
        </ol>
    </div>
</nav>

<!-- Main Content -->
<div class="container my-5">
    <div class="card bg-dark text-white mb-4">
        <img src="course-banner.jpg" class="card-img" alt="Course Banner" style="height: 200px; object-fit: cover;">
        <div class="card-img-overlay d-flex align-items-center justify-content-center">
            <h1 class="text-center">The Ultimate Guide To The Best WordPress LMS Plugin</h1>
        </div>
    </div>
    <div class="row g-4">
        <div class="col-md-8">
            <div class="card p-4 border-0 shadow-sm">
                <ul class="nav nav-pills nav-fill mb-4" id="courseTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-dark active" id="overview-tab" data-bs-toggle="pill" data-bs-target="#overview" type="button" role="tab" style="font-size: 1rem; padding: 0.75rem 1.5rem;">
                            Overview
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-dark" id="curriculum-tab" data-bs-toggle="pill" data-bs-target="#curriculum" type="button" role="tab" style="font-size: 1rem; padding: 0.75rem 1.5rem;">
                            Curriculum
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-dark" id="instructor-tab" data-bs-toggle="pill" data-bs-target="#instructor" type="button" role="tab" style="font-size: 1rem; padding: 0.75rem 1.5rem;">
                            Instructor
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-dark" id="faqs-tab" data-bs-toggle="pill" data-bs-target="#faqs" type="button" role="tab" style="font-size: 1rem; padding: 0.75rem 1.5rem;">
                            FAQs
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-dark" id="reviews-tab" data-bs-toggle="pill" data-bs-target="#reviews" type="button" role="tab" style="font-size: 1rem; padding: 0.75rem 1.5rem;">
                            Reviews
                        </button>
                    </li>
                </ul>
                <div class="tab-content p-4 bg-light" id="courseTabsContent">
                    <!-- Overview Tab -->
                    <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                        <p class="text-muted lead">LearnPress is a comprehensive WordPress LMS Plugin for WordPress. This is one of the best WordPress LMS Plugins which can be used to easily create & sell courses online.</p>
                    </div>
                    <!-- Curriculum Tab -->
                    <div class="tab-pane fade" id="curriculum" role="tabpanel" aria-labelledby="curriculum-tab">
                        <ul class="list-unstyled">
                            <?php
                            for ($i = 1; $i <= 10; $i++) { ?>
                                <li class="mb-2">
                                    <button class="btn btn-primary btn-sm me-2">Preview</button>
                                    HELU Lesson <?php echo $i; ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <!-- Instructor Tab -->
                    <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="instructor-tab">
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0">
                                <div class="bg-danger rounded-circle d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                    <span class="text-white fw-bold" style="font-size: 1.5rem;">QT</span>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5 class="mb-0">ThimPress</h5>
                                <p class="text-muted mb-0">★ 156 Students ★ 20 Lessons</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="#" class="text-muted"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="text-muted"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="text-muted"><i class="bi bi-instagram"></i></a>
                        </div>
                        <button class="btn btn-outline-primary w-100 mt-3">Follow</button>
                    </div>
                    <!-- FAQs Tab -->
                    <div class="tab-pane fade" id="faqs" role="tabpanel" aria-labelledby="faqs-tab">
                        <div class="accordion" id="faqAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq1">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq1Content" aria-expanded="true" aria-controls="faq1Content">
                                        What Does Royalty Free Mean?
                                    </button>
                                </h2>
                                <div id="faq1Content" class="accordion-collapse collapse show" aria-labelledby="faq1" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Royalty-free means you can use the content without paying ongoing royalties or licensing fees.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq2">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2Content" aria-expanded="false" aria-controls="faq2Content">
                                        What Does Royalty Free Mean?
                                    </button>
                                </h2>
                                <div id="faq2Content" class="accordion-collapse collapse" aria-labelledby="faq2" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Royalty-free means you can use the content without paying ongoing royalties or licensing fees.
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="faq3">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3Content" aria-expanded="false" aria-controls="faq3Content">
                                        What Does Royalty Free Mean?
                                    </button>
                                </h2>
                                <div id="faq3Content" class="accordion-collapse collapse" aria-labelledby="faq3" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        Royalty-free means you can use the content without paying ongoing royalties or licensing fees.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Reviews Tab -->
                    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                        <div class="mb-3">
                            <h5>Comments <span class="text-warning">★★★★☆</span> 4.0 based on 146,751 ratings</h5>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">90%</div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 2%" aria-valuenow="2" aria-valuemin="0" aria-valuemax="100">2%</div>
                            </div>
                            <div class="progress">
                                <div class="progress-bar bg-warning" role="progressbar" style="width: 1%" aria-valuenow="1" aria-valuemin="0" aria-valuemax="100">1%</div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0">
                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <span class="text-white">H</span>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <p class="mb-0">Hong</p>
                                <small class="text-muted">October 03, 2025</small>
                            </div>
                            <button class="btn btn-link text-primary p-0">Reply</button>
                        </div>
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0">
                                <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                    <span class="text-white">N</span>
                                </div>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <p class="mb-0">Nga</p>
                                <small class="text-muted">October 03, 2024</small>
                            </div>
                            <button class="btn btn-link text-primary p-0">Reply</button>
                        </div>
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Comment Section -->
            <div class="card mt-4 p-3">
                <h4>Leave A Comment</h4>
                <p class="text-muted">Your email address will not be published. Required fields are marked *</p>
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name*</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email*</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="comment" class="form-label">Comment</label>
                        <textarea class="form-control" id="comment" rows="3"></textarea>
                    </div>
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="saveInfo">
                        <label class="form-check-label" for="saveInfo">Save my name, email in this browser for the next time I comment</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Post Comment</button>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 text-center">
                <img src="course-info.jpg" class="card-img-top" alt="Course Info" style="height: 200px; object-fit: cover;">
                <div class="card-body">
                    <h5 class="card-title">Create an LMS website with LearnPress</h5>
                    <p class="card-text">
                        <span class="badge bg-info text-dark">2Weeks</span>
                        <span class="badge bg-info text-dark">150 Students</span>
                        <span class="badge bg-info text-dark">All Levels</span>
                        <span class="badge bg-info text-dark">20 Lessons</span>
                        <span class="badge bg-info text-dark">4 Quizzes</span>
                    </p>
                    <h4 class="text-danger">$49.0</h4>
                    <a href="#" class="btn btn-success w-100">Start Now</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../shared/footer.php'; ?>