<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete User</title>
    <style>
        h1 {
            text-align: center;
            color: #00FF00;
            position: relative;
            top: 50%;
        }
    </style>

</head>

<body>
    <?php
    include 'db.php';

    if (isset($_GET['id'])) {
        // Sanitize and prepare the statement to prevent SQL injection
        $id = (int)$_GET['id'];  // Cast to integer for additional safety

        // Prepare the DELETE statement
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");

        // Execute the statement
        if ($stmt->execute([$id])) {
            echo "<h1>User successfully deleted<h1>";

            // Use JavaScript to redirect after 2 seconds
            echo "<script>
                setTimeout(function() {
                    window.location.href = 'index.php';
                }, 1000);  // 2-second delay before redirect
              </script>";
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
    ?>
</body>

</html>