<?php
session_start();
include 'db.php'; // Include the database connection

// Fetch episode details and existing reviews
$episode_id = $_GET['id']; // Assuming episode ID is passed as a query parameter
$query = "SELECT * FROM episode WHERE episode_id=?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $episode_id);
$stmt->execute();
$result = $stmt->get_result();

// Display episode details and reviews
while ($row = $result->fetch_assoc()) {
    echo "<h2>" . htmlspecialchars($row['episode']) . "</h2>";
    echo "<p>Review by: " . htmlspecialchars($row['username']) . "</p>";
    echo "<p>Comment: " . htmlspecialchars($row['comment']) . "</p>";
    echo "<p>Score: " . htmlspecialchars($row['score']) . "</p>";
}

// Review submission form
if (isset($_SESSION['username'])) {
    echo '<form action="submit-review.php" method="POST">
            <textarea name="comment" placeholder="Write your review here..." required></textarea>
            <input type="number" name="score" min="0" max="5" step="0.1" placeholder="Score (0-5)" required>
            <input type="submit" value="Submit Review">
          </form>';
} else {
    echo '<p>You must be logged in to submit a review. <a href="signin.php">Sign in</a> or <a href="signup.php">Create an account</a>.</p>';
}

$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/x-icon" href="assets/riotfav.ico" />
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/styleepisode.css" />
  <link rel="icon" type="image/x-icon" href="assets/riotfav.ico">
</head>

<body>
  <audio id="backgroundMusic" src="assets/arcane-OST.mp3"></audio>
  <main class="episodes-container">
    <nav class="nav-header" role="navigation">
      <img
        src="https://cdn.builder.io/api/v1/image/assets/TEMP/4955c6b878f73b51cfd13a4a3e8aaf8e61b6749d2d2382d6106ba6efe3206cd9?placeholderIfAbsent=true&apiKey=97e7175834584b0684c0095103c3743d"
        alt="Site logo" class="nav-logo" />
      <div class="nav-links">
        <a href="../src" style="cursor: pointer;">DASHBOARD</a>
        <a href="signin.html">Login</a>
        <div style="cursor: pointer;"><img id="musicControl" src="assets/sound.png" width="15%"></div>
      </div>
    </nav>

    <div class="episodes-grid">
      <section class="episodes-list" aria-label="Episodes list">
        <div class="episodes-scroll">
          <div class="episode-cards">
            <article class="episode-card">
              <h2 class="episode-title">S1 - E1: Welcome to the Playground</h2>
              <div class="episode-thumbnail">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/053814042c3750304d9732c353ff9b9c5f7429d59c377f0272ce540cd7cebf7d?placeholderIfAbsent=true&apiKey=97e7175834584b0684c0095103c3743d"
                  alt="Episode 1 thumbnail" class="thumbnail-img" />
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/62d60f1f6ed1a77f16bec1c2ee92bb658aeb5a7ea4361074abff453501dffbd4?placeholderIfAbsent=true&apiKey=97e7175834584b0684c0095103c3743d"
                  alt="" class="play-icon" />
              </div>
            </article>

            <article class="episode-card">
              <h2 class="episode-title">S1 - E2: Some Mysteries Are Better Left Unsolved</h2>
              <div class="episode-thumbnail">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/2d863f7f0507d82c6bcce3d4e6c187bf58ca3ad33bda3f2349ee4d1d05b9f3ad?placeholderIfAbsent=true&apiKey=97e7175834584b0684c0095103c3743d"
                  alt="Episode 2 thumbnail" class="thumbnail-img" />
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/2030b6c51d65e6a17e00d291ed89053973e25898b9cba467e9fa8abcf953c928?placeholderIfAbsent=true&apiKey=97e7175834584b0684c0095103c3743d"
                  alt="" class="play-icon" />
              </div>
            </article>

            <article class="episode-card">
              <h2 class="episode-title">S1 - E3: The Base Violence Necessary for Change</h2>
              <div class="episode-thumbnail">
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/fed708e10292ccaa0152843174e1652eadbc33138f2c0607a57c157577d3d2ea?placeholderIfAbsent=true&apiKey=97e7175834584b0684c0095103c3743d"
                  alt="Episode 3 thumbnail" class="thumbnail-img" />
                <img
                  src="https://cdn.builder.io/api/v1/image/assets/TEMP/e6a5d622fde8411122c454d167c9b04e0afe248ffd24be4bd53d7e36bb2d072c?placeholderIfAbsent=true&apiKey=97e7175834584b0684c0095103c3743d"
                  alt="" class="play-icon" />
              </div>
            </article>
          </div>
        </div>
      </section>

      <section class="episode-details" aria-label="Episode details">
        <img src="assets/episode1.jpg" alt="Episode hero image" class="episode-hero" />
        <h1 class="episode-heading">S1 - E1: Welcome to the Playground</h1>
        <div class="episode-score">Review score: 4.9/5.0</div>
        <p class="episode-description">Orphaned sisters Vi and Powder bring trouble to Zaun's underground streets in the
          wake of a heist in posh Piltover.</p>
      </section>
    </div>

    <section class="review-section" aria-label="Write review">
      <h2 class="review-heading">Write your review</h2>
      <form class="review-form" method="POST" action="submit_review.php">
        <label for="review-text" class="visually-hidden">Write your review</label>
        <textarea id="review-text" class="review-input" name="comment"
          placeholder="write your opinion about this episode...."></textarea>

        <div class="review-footer">
          <div class="score-input">
            <label for="score">Review score:</label>
            <input type="number" id="score" name="score" class="score-value" min="0" max="5" step="0.1" required>
            <span>/ 5.0</span>
          </div>
          <button type="submit" class="submit-review">Post</button>
        </div>
      </form>

    </section>

    <section class="review-section" aria-label="User reviews">
      <h2 class="review-heading">Reviews</h2>
      <div class="reviews-list">
        <article class="review-card">
          <img
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/10a58eee461a9ffb867f62cffb7e11e578e7d9be1b4d73b515f6afed215c0e35?placeholderIfAbsent=true&apiKey=97e7175834584b0684c0095103c3743d"
            alt="Alfan's avatar" class="reviewer-avatar" />
          <div class="review-content">
            <h3 class="reviewer-name">Alfan</h3>
            <p class="review-text">I like that despite Powder being better off in this universe, she wasn't perfect. She
              still seemed to struggle with her mental health, just in a less violent/insane way.</p>
            <div class="review-score">Score: 4.8/5.0</div>
          </div>
        </article>

        <article class="review-card">
          <img
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/ab64c9e7a989a076e654deb22bdd03dbe113559943aa65148c5b4399bc92d889?placeholderIfAbsent=true&apiKey=97e7175834584b0684c0095103c3743d"
            alt="Karel's avatar" class="reviewer-avatar" />
          <div class="review-content">
            <h3 class="reviewer-name">Karel</h3>
            <p class="review-text">I like that despite Powder being better off in this universe, she wasn't perfect. She
              still seemed to struggle with her mental health, just in a less violent/insane way.</p>
            <div class="review-score">Score: 4.8/5.0</div>
          </div>
        </article>

        <article class="review-card">
          <img
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/f6920bd4554a464eec94b54e04175de4adca68bbb3294089d3bb7ad69adecb9d?placeholderIfAbsent=true&apiKey=97e7175834584b0684c0095103c3743d"
            alt="Anas's avatar" class="reviewer-avatar" />
          <div class="review-content">
            <h3 class="reviewer-name">Anas</h3>
            <p class="review-text">I like that despite Powder being better off in this universe, she wasn't perfect. She
              still seemed to struggle with her mental health, just in a less violent/insane way.</p>
            <div class="review-score">Score: 4.8/5.0</div>
          </div>
        </article>
      </div>
    </section>
  </main>
  <script>
    document.getElementById('focusEpisode').addEventListener('click', function () {
      document.getElementById('focusthisEpisode').scrollIntoView({ behavior: "smooth" });
      document.getElementById('focusthisEpisode').focus();
    });

    const musicControl = document.getElementById('musicControl');
    const backgroundMusic = document.getElementById('backgroundMusic');

    let isPlaying = false; musicControl.addEventListener('click',
      function () {
        if (isPlaying) { backgroundMusic.pause(); musicControl.src = 'assets/sound.png'; }
        else { backgroundMusic.play(); musicControl.src = 'assets/music.png'; }
        isPlaying = !isPlaying;
      });

    document.addEventListener("DOMContentLoaded", function () {
      const elements = document.querySelectorAll('.reveal');

      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('visible');
          }
        });
      });

      elements.forEach(element => {
        observer.observe(element);
      });
    });
    backgroundMusic.addEventListener('error', function () {
      console.error('Error loading audio file.');
    });
  </script>
</body>

</html>