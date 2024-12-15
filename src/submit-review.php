<?php
session_start();
include 'db.php'; // Include the database connection

if (!isset($_SESSION['username']) || !isset($_SESSION['email'])) {
    die("You must be logged in to submit a review.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $comment = trim($_POST['comment']);
    $score = floatval($_POST['score']);
    $email = $_SESSION['email'];
    $username = $_SESSION['username'];

    if (empty($comment)) {
        die("Review comment cannot be empty.");
    }
    if ($score < 0 || $score > 5) {
        die("Score must be between 0.0 and 5.0.");
    }

    $query = "INSERT INTO episode (email, username, comment, score) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sssd', $email, $username, $comment, $score);

    if ($stmt->execute()) {
        echo "Review submitted successfully!";
    } else {
        echo "Error: " . htmlspecialchars($stmt->error);
    }

    $stmt->close();
}
$conn->close();
?>