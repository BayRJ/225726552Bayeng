<?php
include 'db.php';

if (isset($_GET['id'])) {
    // Sanitize and prepare the statement to prevent SQL injection
    $id = (int)$_GET['id'];  // Cast to integer for additional safety

    // Prepare the DELETE statement
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");

    // Execute the statement
    if ($stmt->execute([$id])) {
        echo "User successfully deleted";
        sleep(2);  // Wait 2 seconds before redirecting
        header("Location: index.php");
        exit();
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
