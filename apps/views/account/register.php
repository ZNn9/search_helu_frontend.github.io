<?php include __DIR__ . '/../shared/header.php'; ?>

<body>
    <!-- Main Content -->
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Register</h2>
                <form>
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="First Name">
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="Last Name">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">User Name</label>
                        <input type="text" class="form-control" id="username" placeholder="User Name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-Mail</label>
                        <input type="email" class="form-control" id="email" placeholder="E-Mail">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Password Confirmation</label>
                        <input type="password" class="form-control" id="confirmPassword" placeholder="Password Confirmation">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="terms">
                        <label class="form-check-label" for="terms">By signing up, I agree with the website's Terms and Conditions</label>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Register</button>
                    <!-- Chưa sử lý sự kiện của Register -->
                </form>
            </div>
        </div>
    </div>
</body>

<?php include __DIR__ . '/../shared/footer.php'; ?>