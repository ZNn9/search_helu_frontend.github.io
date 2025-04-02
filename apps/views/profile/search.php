<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/style_profile.css">
    <link rel="stylesheet" href="css/style_search.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <img src="../../images/logo.png" alt="Sidebar Image"> <!-- Add the image here -->
            <ul>              
                <li><a href="foryou.php"><span class="icon">&#127968;</span>For You</a></li>
                <li><a href="search.php" class="active"><span class="icon">&#128269;</span>Explore</a></li>
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
            <div class="filters">
                <div class="filter">
                    <button class="filter-btn">Category</button>
                    <div class="filter-content">
                        <label><input type="checkbox" name="category" value="all"> All</label>
                        <label><input type="checkbox" name="category" value="designer" checked> Designer</label>
                        <label><input type="checkbox" name="category" value="development"> Development</label>
                    </div>
                </div>
                <div class="filter">
                    <button class="filter-btn">Instructor</button>
                    <div class="filter-content">
                        <label><input type="checkbox" name="instructor" value="john_doe"> John Doe</label>
                        <label><input type="checkbox" name="instructor" value="jane_smith"> Jane Smith</label>
                        <label><input type="checkbox" name="instructor" value="michael_brown"> Michael Brown</label>
                    </div>
                </div>
                <div class="filter">
                    <button class="filter-btn">Review</button>
                    <div class="filter-content">
                        <label><input type="checkbox" name="review" value="5_stars"> 5 Stars</label>
                        <label><input type="checkbox" name="review" value="4_stars"> 4 Stars</label>
                        <label><input type="checkbox" name="review" value="3_stars"> 3 Stars</label>
                    </div>
                </div>
                <div class="filter">
                    <button class="filter-btn">Price</button>
                    <div class="filter-content">
                        <label><input type="checkbox" name="price" value="free"> Free</label>
                        <label><input type="checkbox" name="price" value="paid"> Paid</label>
                        <label><input type="checkbox" name="price" value="subscription"> Subscription</label>
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
