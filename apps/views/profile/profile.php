<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/style_profile.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <img src="../../images/logo.png" alt="Sidebar Image"> <!-- Add the image here -->
            <ul>
                <li><a href="foryou.php"><span class="icon">&#127968;</span>For You</a></li>
                <li><a href="search.php"><span class="icon">&#128269;</span>Explore</a></li>
                <li><a href="#"><span class="icon">&#128101;</span>Following</a></li>
                <li><a href="profile.php" class="active"><span class="icon">&#128100;</span>Profile</a></li>
            </ul>
            <button class="login-btn" onclick="location.href='../login.php'">Log in</button>
            <div class="extra-section">
                <a href="#">Create Tiktok effects, get a reward</a>
                <p>Company</p>
                <p>Program</p>
                <p>Terms & Policies</p>
                <div class="footer">
                    <a href="#">See more</a>
                    <p>2024 Tiktok</p>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="header">
                <div class="search-container">
                    <input type="text" placeholder="Search">
                    <span class="search-icon" onclick="searchFunction()">&#128269;</span>
                </div>
                <button class="login-btn" onclick="location.href='../login.php'">Log in</button>
            </div>
            <div class="profile-info">
                <img src="../../images/home/study.png" alt="Profile Picture" class="profile-pic">
                <div class="info">
                    <h2>upvxx_</h2>
                    <div>
                        <button class="edit-profile">Edit profile</button>
                        <button class="ad-tools">Ad tools</button>
                    </div>
                    <div class="stats">
                        <p>11 posts</p>
                        <p>41 followers</p>
                        <p>17 following</p>
                    </div>
                    <div class="bio">
                        <p>Upvox</p>
                        <p>Product/service</p>
                        <p>Your favourite fun clips in your language 🌐</p>
                        <a href="#" class="website">upvox.net</a>
                    </div>
                </div>
            </div>
            <div class="navbar">
                <a href="#" class="active">Posts</a>
                <a href="#">Videos</a>
                <a href="#">Saved</a>
                <a href="#">Liked</a>
            </div>
            <div class="posts">
                <div class="post"><img src="../../images/home/study.png" alt="Post 1"></div>
                <div class="post"><img src="../../images/home/study.png" alt="Post 2"></div>
                <div class="post"><img src="../../images/home/study.png" alt="Post 3"></div>
                <!-- Add more posts as needed -->
            </div>
        </div>
    </div>
    <script>
        // function searchFunction() {
        //     // Implement search functionality here
        //     alert('Search icon clicked!');
        // }
    </script>
</body>
</html>
