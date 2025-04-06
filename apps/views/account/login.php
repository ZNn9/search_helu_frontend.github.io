<?php include __DIR__ . '/../shared/header.php'; ?>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 70vh;">
        <div class="card p-4 shadow-lg" style="width: 400px; border-radius: 10px;">
            <h5 class="text-center">Hi, Welcome back!</h5>
            <form id="login-form">
                <button type="button" id="login-button" class="btn btn-primary w-100 mt-3">LOGIN GOOGLE</button>
            </form>
        </div>
    </div>

</body>

<?php include __DIR__ . '/../shared/footer.php'; ?>


<script>
    document.getElementById('login-button').addEventListener('click', function () {
        const apiUrl = `http://${window.location.hostname}:8000/api/auth/google`;
        fetch(apiUrl, {
            method: 'GET',
        })
        .then(response => response.json()) 
        .then(data => {
            if (data.url) {
                window.location.href = data.url;
            } else {
                console.error('Không nhận được URL hoặc token từ API');
                alert('Đã xảy ra lỗi khi đăng nhập.');
            }
        })
        .catch(error => {
            console.error('Lỗi khi gọi API:', error);
            alert('Đã xảy ra lỗi khi kết nối đến API.');
        });
    });
</script>