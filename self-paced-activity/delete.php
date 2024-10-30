<?php

include 'db.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM users WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "User successfully deleted";
    } else {
        echo "Error deleting user." . $sql . "<br>" . $conn->error;
    }
}
