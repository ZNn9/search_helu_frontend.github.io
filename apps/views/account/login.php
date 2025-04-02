<?php include __DIR__ . '/../shared/header.php'; ?>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
        <div class="card p-4 shadow-lg" style="width: 400px; border-radius: 10px;">
            <h5 class="text-center">Hi, Welcome back!</h5>
            <form>
                <div class="form-group mt-3">
                    <input type="text" class="form-control" placeholder="Username or Email Address">
                </div>
                <div class="form-group mt-3">
                    <input type="password" class="form-control" placeholder="Password">
                </div>
                <div class="form-check mt-3">
                    <input type="checkbox" class="form-check-input" id="keepSignedIn">
                    <label class="form-check-label" for="keepSignedIn">Keep me signed in</label>
                    <a href="#" class="float-end text-decoration-none">Forgot?</a>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-3">Sign In</button>
            </form>
            <p class="text-center mt-3">Don't have an account? <a href="/search_helu_frontend/account/register" class="text-decoration-none">Register Now</a></p>
        </div>
    </div>
</body>

<?php include __DIR__ . '/../shared/footer.php'; ?>