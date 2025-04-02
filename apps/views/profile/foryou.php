<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explore</title>
    <link rel="stylesheet" href="css/style_explore.css"> <!-- Link to the new CSS file -->
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <img src="../../images/logo.png" alt="Sidebar Image"> <!-- Add the image here -->
            <ul>
                <li><a href="foryou.php" class="active"><span class="icon">&#127968;</span>For You</a></li>
                <li><a href="search.php"><span class="icon">&#128269;</span>Explore</a></li>
                <li><a href="#"><span class="icon">&#128101;</span>Following</a></li>
                <li><a href="profile.php"><span class="icon">&#128100;</span>Profile</a></li>
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
            <div class="post-container">
                <div class="post">
                    <div class="post-header">
                        <img src="../../images/user.png" alt="Profile Picture">
                        <span class="username">lewishamilton</span>
                    </div>
                    <img src="../../images/home/study.png" alt="Post Image">
                    <div class="post-details">
                        <span class="price">$29.0</span>
                        <span class="free">Free</span>
                        <div class="rating">
                            <span>&#9733;</span>
                            <span>&#9733;</span>
                            <span>&#9733;</span>
                            <span>&#9733;</span>
                            <span>&#9733;</span>
                        </div>
                        <div class="actions">
                            <span>&#9825;</span>
                            <span>&#128172;</span>
                            <span>&#10148;</span>
                        </div>
                    </div>
                    <div class="post-content">
                        <p>eldenriing</p>
                    </div>
                    <div class="post-actions">
                        <div class="likes">
                            <span>&#128077;</span>
                            <span>741,368 likes</span>
                        </div>
                        <div class="comments">
                            <span>&#128172;</span>
                            <span>13,384 comments</span>
                        </div>
                    </div>
                    <div class="post-footer">
                        <span class="translation">See translation</span>
                        <span class="view-comments">View all 13,384 comments</span>
                        <div class="add-comment">
                            <input type="text" placeholder="Add a comment...">
                            <button type="button">Post</button>
                        </div>
                    </div>
                </div>
                <div class="post">
                    <div class="post-header">
                        <img src="../../images/user.png" alt="Profile Picture">
                        <span class="username">ZZZZ</span>
                    </div>
                    <img src="../../images/home/study.png" alt="Post Image">
                    <div class="post-details">
                        <span class="price">$29.0</span>
                        <span class="free">Free</span>
                        <div class="rating">
                            <span>&#9733;</span>
                            <span>&#9733;</span>
                            <span>&#9733;</span>
                            <span>&#9733;</span>
                            <span>&#9733;</span>
                        </div>
                        <div class="actions">
                            <span>&#9825;</span>
                            <span>&#128172;</span>
                            <span>&#10148;</span>
                        </div>
                    </div>
                    <div class="post-content">
                        <p>@tiudasdasd</p>
                    </div>
                    <div class="post-actions">
                        <div class="likes">
                            <span>&#128077;</span>
                            <span>500,000 likes</span>
                        </div>
                        <div class="comments">
                            <span>&#128172;</span>
                            <span>10,000 comments</span>
                        </div>
                    </div>
                    <div class="post-footer">
                        <span class="translation">See translation</span>
                        <span class="view-comments">View all 10,000 comments</span>
                        <div class="add-comment">
                            <input type="text" placeholder="Add a comment...">
                            <button type="button">Post</button>
                        </div>
                    </div>
                </div>
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
