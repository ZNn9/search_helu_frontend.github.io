<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/register.css">
</head>

<body>

    <?php include '../includes/header.php'; ?>

    <div class="container">
        <div class="register-box">
            <h2>Create an Account</h2>
            <form action="register_process.php" method="POST">
                <div class="input-group">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
                </div>
                <div class="input-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" placeholder="Last Name" required>
                </div>
                <div class="input-group">
                    <label for="username">User Name</label>
                    <input type="text" id="username" name="username" placeholder="User Name" required>
                </div>
                <div class="input-group">
                    <label for="email">E-Mail</label>
                    <input type="email" id="email" name="email" placeholder="E-Mail" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="input-group">
                    <label for="confirm_password">Password Confirmation</label>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Password Confirmation" required>
                </div>
                <div class="terms">
                    <input type="checkbox" required> By signing up, I agree with the website’s <a href="#">Terms and Conditions</a>
                </div>
                <button type="submit" class="register-btn">Register</button>
            </form>
        </div>
    </div>

    <?php include '../includes/footer.php'; ?>

</body>

</html>