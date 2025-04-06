<?php include __DIR__ . '/../shared/header.php'; ?>

<?php
// Get the lesson number from the query parameter
$lessonNumber = isset($_GET['lesson']) ? intval($_GET['lesson']) : 1;
// Map the lesson number to the corresponding video file
$videoFile = "/search_helu_frontend/assets/video/Lesson{$lessonNumber}.mp4";
?>


<div class="container mt-4">
    <div class="row">
        <!-- Video Section -->
        <div class="col-md-8">
            <h2 class="mb-4">Lesson Video</h2>
            <div class="ratio ratio-16x9">
                <video controls>
                    <source src="<?php echo $videoFile; ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>

        <!-- Chatbox Section -->
        <div class="col-md-4">
            <h3 class="mb-4">Comments</h3>
            <div class="card">
                <div class="card-body">
                    <div id="chatbox" style="height: 300px; overflow-y: auto; border: 1px solid #ddd; padding: 10px;">
                        <!-- Existing comments will be dynamically loaded here -->
                        <p><strong>John:</strong> Great video, very informative!</p>
                        <p><strong>Jane:</strong> I have a question about the topic discussed at 5:30.</p>
                    </div>
                    <form id="chatForm" class="mt-3">
                        <div class="mb-3">
                            <label for="comment" class="form-label">Your Comment</label>
                            <textarea class="form-control" id="comment" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Post Comment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Handle chat form submission
    document.getElementById('chatForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const commentBox = document.getElementById('chatbox');
        const commentInput = document.getElementById('comment');
        const newComment = document.createElement('p');
        newComment.innerHTML = `<strong>You:</strong> ${commentInput.value}`;
        commentBox.appendChild(newComment);
        commentInput.value = '';
        commentBox.scrollTop = commentBox.scrollHeight; // Scroll to the bottom
    });
</script>

<?php include __DIR__ . '/../shared/footer.php'; ?>