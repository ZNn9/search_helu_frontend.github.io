<?php include __DIR__ . '/../shared/header.php'; ?>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
        <div class="card p-4 shadow-lg" style="width: 400px; border-radius: 10px;">
            <h5 class="text-center">Hi, Welcome back!</h5>
            <form id="login-form">
                <button type="button" id="login-button" class="btn btn-primary w-100 mt-3">LOGIN GOOGLE</button>
            </form>
            <div id="error-message" class="text-danger text-center mt-3" style="display: none;"></div>
        </div>
    </div>

    <script>
        document.getElementById('login-button').addEventListener('click', async function() {
            try {
                // Lấy domain và port của FE từ window.location
                const feBaseUrl = window.location.origin;
                const redirectUrl = `${feBaseUrl}/search_helu_frontend/home`;

                // Gọi API BE trên port 8000
                const apiUrl = `http://${window.location.hostname}:8000/api/auth/google?redirect_url=${encodeURIComponent(redirectUrl)}`;

                const response = await fetch(apiUrl, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                    },
                });

                if (!response.ok) {
                    const errorData = await response.json();
                    throw new Error(errorData.error || 'Không thể lấy URL Google');
                }

                const data = await response.json();
                window.location.href = data.url; // Chuyển hướng đến Google
            } catch (error) {
                const errorMessage = document.getElementById('error-message');
                errorMessage.textContent = error.message;
                errorMessage.style.display = 'block';
            }
        });
    </script>
</body>

<?php include __DIR__ . '/../shared/footer.php'; ?>