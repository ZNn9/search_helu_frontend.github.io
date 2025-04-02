<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/style_search.css">
    <link rel="stylesheet" href="css/style_search_result.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <img src="../../images/logo.png" alt="Sidebar Image"> <!-- Add the image here -->
            <ul>
                <li><a href="#"><span class="icon">&#127968;</span>For You</a></li>
                <li><a href="#" class="active"><span class="icon">&#128269;</span>Explore</a></li>
                <li><a href="#"><span class="icon">&#128101;</span>Following</a></li>
                <li><a href="#"><span class="icon">&#128100;</span>Profile</a></li>
            </ul>
            <button class="login-btn">Log in</button>
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
                <button class="login-btn">Log in</button>
            </div>
            <div class="search-results">
                <div class="result-card">
                    <div class="result-header">
                        <img src="../../images/user.png" alt="Profile Picture" class="profile-pic">
                        <span class="username">yournamehere</span>
                    </div>
                    <div class="result-image">
                        <img src="../../images/home/study.png" alt="Result Image">
                    </div>
                    <div class="result-info">
                        <span class="price">$29.0</span>
                        <span class="free">Free</span>
                        <div class="rating">
                            <span class="stars">★★★★★</span>
                        </div>
                        <div class="actions">
                            <span class="like">&#10084;</span>
                            <span class="comment">&#128172;</span>
                            <span class="share">&#128257;</span>
                        </div>
                        <div class="likes">74 likes</div>
                        <div class="description">
                            <p><strong>yournamehere</strong> Flyer design for Workspace 51.</p>
                            <p><strong>marlijnvanderlans</strong> Mooi!</p>
                            <p><strong>thornebrandinganddesign</strong> Lovely airy brochure. A perfect example of white space used successfully</p>
                        </div>
                        <div class="date">June 7, 2021 · View translation</div>
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
