<?php

include 'db.php';


if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);


    if ($stmt->execute()) {
        echo "User successfully deleted";
    } else {
        echo "Error deleting user." . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
} else {
    echo "No ID specified for deletion.";
}
