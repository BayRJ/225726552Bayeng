<?php
include 'db.php';

if (isset($_GET['id'])) {
    // Sanitize and prepare the statement to prevent SQL injection
    $id = (int)$_GET['id'];  // Cast to integer for additional safety

    // Prepare the DELETE statement
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");

    header("Location: ./index.php");
    // Execute the statement
    if ($stmt->execute([$id])) {
        echo "User successfully deleted";
    } else {
        echo "Error deleting user: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    echo "No ID specified for deletion.";
}

// Close the database connection
$conn->close();

sleep(3);
