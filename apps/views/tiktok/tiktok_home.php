<?php
require_once __DIR__ . '/../../controllers/accountController.php';
$accountController = new AccountController();
function getAccountId($accountController)
{
  return $accountController->getAccountId();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TikTok Video Feed</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    /* Custom styles */
    body {
      background: #f5f5f5;
      font-family: system-ui, -apple-system, sans-serif;
    }

    /* Header */
    header {
      background: #fff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    header img {
      transition: transform 0.2s;
    }

    header img:hover {
      transform: scale(1.1);
    }

    header input {
      max-width: 300px;
      border-radius: 20px;
      background: #f8f9fa;
    }

    header .btn-login {
      border-radius: 20px;
      padding: 0.5rem 1.5rem;
    }

    /* Sidebar */
    .sidebar {
      background: #fff;
      box-shadow: 2px 0 4px rgba(0, 0, 0, 0.05);
      height: calc(100vh - 60px);
      position: sticky;
      top: 60px;
    }

    .sidebar ul li a {
      color: #6c757d;
      padding: 0.75rem 1rem;
      display: block;
      transition: color 0.2s, background 0.2s;
    }

    .sidebar ul li a:hover {
      color: #007bff;
      background: #f8f9fa;
      border-radius: 8px;
    }

    .sidebar .btn-login {
      border-radius: 20px;
      padding: 0.5rem;
      font-weight: 500;
    }

    .sidebar .promo-card {
      background: #e9ecef;
      border-radius: 8px;
      padding: 1rem;
      font-size: 0.9rem;
      color: #343a40;
    }

    .sidebar footer {
      font-size: 0.85rem;
      color: #6c757d;
    }

    .sidebar footer p {
      margin: 0.25rem 0;
    }

    /* Video Feed */
    .video-feed {
      scroll-snap-type: y proximity;
      overflow-y: auto;
      height: calc(100vh - 60px);
      padding-bottom: 20px;
    }

    .video-card {
      scroll-snap-align: start;
      background: #fff;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      margin-bottom: 1rem;
      transition: transform 0.3s ease;
    }

    .video-card:hover {
      transform: translateY(-5px);
    }

    .video-card video {
      width: 100%;
      max-height: 80vh;
      object-fit: cover;
      border-top-left-radius: 12px;
      border-top-right-radius: 12px;
    }

    .caption {
      position: absolute;
      bottom: 1rem;
      left: 1rem;
      background: rgba(0, 0, 0, 0.7);
      color: #fff;
      padding: 0.5rem 1rem;
      border-radius: 20px;
      font-size: 1.1rem;
      font-weight: 500;
    }

    .video-info {
      padding: 1.5rem;
      position: relative;
    }

    .stats {
      font-size: 0.9rem;
      color: #6c757d;
      margin-bottom: 1rem;
    }

    .actions {
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: absolute;
      bottom: 1rem;
      left: 1.5rem;
      right: 1.5rem;
    }

    .actions .like-btn {
      font-size: 1.75rem;
      color: #6c757d;
      transition: transform 0.2s, color 0.2s;
    }

    .actions .like-btn:hover {
      transform: scale(1.2);
      color: #dc3545;
    }

    .actions .like-btn.liked {
      color: #dc3545;
    }

    .description {
      font-size: 0.9rem;
      color: #343a40;
      line-height: 1.6;
    }

    /* Spinner */
    .spinner {
      display: none;
      width: 40px;
      height: 40px;
      border: 4px solid #f3f3f3;
      border-top: 4px solid #007bff;
      border-radius: 50%;
      animation: spin 1s linear infinite;
      margin: 1rem auto;
    }

    @keyframes spin {
      0% {
        transform: rotate(0deg);
      }

      100% {
        transform: rotate(360deg);
      }
    }

    /* Main footer */
    footer.main-footer {
      background: #fff;
      box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.05);
    }

    /* Modal visibility */
    .hidden {
      display: none;
    }

    #advanced-search-modal {
      z-index: 1050;
    }
  </style>
</head>

<body>
  <!-- Header -->
  <header class="d-flex align-items-center justify-content-between p-3">
    <!-- Logo with link -->
    <a href="/search_helu_frontend/home" class="d-flex align-items-center text-decoration-none">
      <img aria-hidden="true" alt="logo" src="https://openui.fly.dev/openui/24x24.svg?text=🏠" class="me-2" />
      <span class="fs-5 fw-bold text-dark">Logo</span>
    </a>

    <!-- Search bar -->
    <input type="text" placeholder="Search" class="form-control" />

    <!-- Log in button -->
    <a class="btn btn-primary btn-login" href="/search_helu_frontend/account/login">Log in</a>
  </header>

  <div class="d-flex flex-column min-vh-100">
    <div class="d-flex flex-grow-1">
      <!-- Sidebar (Left) -->
      <nav class="col-md-3 p-3 sidebar">
        <ul class="list-unstyled mt-3">
          <li><a href="/search_helu_frontend/tiktok" class="text-decoration-none">Home</a></li>
          <li><a href="#" class="text-decoration-none">Explore</a></li>
          <li><a href="/search_helu_frontend/tiktok/advancedsearch" class="text-decoration-none">Search Advanced</a></li>
          <li><a href="#" class="text-decoration-none">Following</a></li>
          <li><a href="/search_helu_frontend/tiktok/profile/1" class="text-decoration-none">Profile</a></li>
          <li><a href="#" class="text-decoration-none">More</a></li>
        </ul>
        <button class="btn btn-primary btn-login w-100 mt-3">Log in</button>
        <div class="promo-card mt-3">
          <p class="mb-0">Create TikTok effects, get a reward</p>
        </div>
        <footer class="mt-3">
          <p>Company</p>
          <p>Program</p>
          <p>Terms & Policies</p>
          <p>See more</p>
          <p class="mt-3">2024 TikTok</p>
        </footer>
      </nav>

      <!-- Main Content -->
      <main class="flex-grow-1 p-3">
        <!-- Video Feed -->
        <div id="video-feed" class="video-feed"></div>
        <div id="loading-spinner" class="spinner"></div>
      </main>
    </div>

    <!-- Footer -->
    <footer class="p-3 text-center text-muted main-footer">
      <p>© 2025</p>
    </footer>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script>
    let loading = false;
    let observer = null;
    let retryCount = 0;
    const maxRetries = 3;
    const videoFeed = document.getElementById('video-feed');
    const spinner = document.getElementById('loading-spinner');
    const idAccount = <?php echo json_encode(getAccountId($accountController)); ?>;

    if (!videoFeed) {
      console.error('Video feed element not found!');
    }

    function checkVideoCards() {
      const cards = document.querySelectorAll('.video-card');
      console.log('Total video cards in DOM:', cards.length);
      cards.forEach((card, index) => {
        console.log(`Card ${index + 1}:`, card);
      });
    }

    async function fetchFeed() {
      if (loading) return;
      loading = true;
      spinner.style.display = 'block';

      try {
        console.log('Fetching videos from API...');
        const res = await fetch('http://127.0.0.1:8000/api/lesson/random');
        if (!res.ok) {
          throw new Error(`HTTP error! Status: ${res.status}`);
        }
        const videos = await res.json();

        console.log('Videos received:', videos);

        if (!Array.isArray(videos) || videos.length === 0) {
          console.warn('No videos returned from API');
          if (retryCount < maxRetries) {
            retryCount++;
            console.log(`Retrying... Attempt ${retryCount}/${maxRetries}`);
            setTimeout(fetchFeed, 5000);
          } else {
            console.error('Max retries reached. Stopping fetch.');
          }
          return;
        }

        retryCount = 0;

        if (!videoFeed) {
          console.error('Video feed element not found!');
          return;
        }

        for (const video of videos) {
          console.log('Adding video:', video.id);
          const card = document.createElement('div');
          card.className = 'video-card';
          card.setAttribute('data-id', video.id || '');

          const vid = document.createElement('video');
          vid.src = video.videoUrl || '';
          vid.controls = false;
          vid.autoplay = true;
          vid.loop = true;
          vid.muted = true;
          vid.playsInline = true;

          vid.addEventListener('play', () => increaseView(video.id));

          const caption = document.createElement('div');
          caption.className = 'caption';
          caption.textContent = video.lessonName || '';

          card.appendChild(vid);
          card.appendChild(caption);

          const videoInfo = document.createElement('div');
          videoInfo.className = 'video-info';

          const stats = document.createElement('div');
          stats.className = 'stats';
          stats.innerHTML = `
                        <span class="view-count">${video.quatityView || 0} views</span> | 
                        <span class="like-count">${video.quatityfavorite || 0} likes</span>
                    `;

          const actions = document.createElement('div');
          actions.className = 'actions';

          const likeBtn = document.createElement('button');
          likeBtn.className = 'like-btn';
          likeBtn.innerHTML = '🤍';

          const isFavorite = await checkFavorite(video.id);
          if (isFavorite) {
            likeBtn.innerHTML = '❤️';
            likeBtn.classList.add('liked');
          }

          likeBtn.addEventListener('click', () => toggleFavorite(video.id, likeBtn));

          const courseBtn = document.createElement('a');
          courseBtn.href = `/course/${video.idCourse || ''}`;
          courseBtn.className = 'btn btn-primary btn-sm rounded-pill';
          courseBtn.textContent = 'Go to Course';

          actions.appendChild(likeBtn);
          actions.appendChild(courseBtn);

          const description = document.createElement('div');
          description.className = 'description';
          description.textContent = video.description || '';

          videoInfo.appendChild(stats);
          videoInfo.appendChild(description);
          videoInfo.appendChild(actions);

          card.appendChild(videoInfo);
          videoFeed.appendChild(card);
        }

        console.log('Videos added, re-observing last card...');
        observeLastVideo();
        checkVideoCards();
      } catch (e) {
        console.error('Error loading videos:', e);
      } finally {
        loading = false;
        spinner.style.display = 'none';
      }
    }

    function observeLastVideo() {
      if (observer) {
        observer.disconnect();
        console.log('Disconnected previous observer');
      }

      const cards = document.querySelectorAll('.video-card');
      console.log('Number of video cards found:', cards.length);

      const lastCard = cards[cards.length - 1];

      if (lastCard) {
        console.log('Observing last card:', lastCard);
        observer = new IntersectionObserver(entries => {
          entries.forEach(entry => {
            console.log('Intersection detected:', entry.isIntersecting, 'Loading:', loading);
            if (entry.isIntersecting && !loading) {
              console.log('Fetching more videos...');
              fetchFeed();
            }
          });
        }, {
          root: null,
          rootMargin: '0px',
          threshold: 0.1,
        });
        observer.observe(lastCard);
      } else {
        console.warn('No last card found to observe');
      }
    }

    function increaseView(id) {
      fetch(`http://127.0.0.1:8000/api/lesson/${id}/view`, {
          method: "POST",
        })
        .then(res => res.json())
        .then(data => {
          const viewCount = document.querySelector(`[data-id="${id}"] .view-count`);
          if (viewCount) {
            viewCount.textContent = `${data.quantityView} views`;
          }
        })
        .catch(err => console.error('Failed to increase view:', err));
    }

    async function checkFavorite(idLesson) {
      try {
        const res = await fetch('http://127.0.0.1:8000/api/lesson/check-favorite', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            idAccount: idAccount,
            idLesson: idLesson,
          }),
        });

        const data = await res.json();
        return data.isFavorite;
      } catch (error) {
        console.error('Error checking favorite status:', error);
        return false;
      }
    }

    function toggleFavorite(id, button) {
      const isLiked = button.classList.contains('liked');
      fetch(`http://127.0.0.1:8000/api/lesson/${id}/favorite`, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            idAccount: idAccount
          }),
        })
        .then(res => res.json())
        .then(data => {
          button.classList.toggle('liked');
          button.innerHTML = isLiked ? '🤍' : '❤️';
          const likeCount = button.closest('.video-info').querySelector('.like-count');
          if (likeCount) likeCount.textContent = `${data.quantityFavorite} likes`;
        })
        .catch(err => console.error('Failed to toggle favorite:', err));
    }

    fetchFeed();
  </script>
</body>

</html>