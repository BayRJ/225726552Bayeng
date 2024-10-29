<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updated List of Users</title>
</head>

<body>
    <h2>Update user</h2>

    <form method="post" action="add.php">
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        Name: <input type="text" name="name" /><br><br>
        Phone: <input type="email" name="email" /><br><br>
        <input type="submit" value="Update Contact">
    </form>
    <a href="index.php">Back to users table</a>
</body>

</html>


<?php

include 'db.php';


if (isset($GET['id'])) {
    $id = $GET['id'];

    $sql = "SELECT * FROM contact WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
    } else {
        echo "No contact found with the ID provided";
    }
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $id = $_POST['id'];

    if (!empty($name) && !empty($email)) {
        $sql = "UPDATE contacts SET name='$name',email='$email' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {
            echo "User succesfully deleted";
        } else {
            echo "Error updating user." . $sql . "<br>" . $conn->error;
        }
    }
} else {
    echo "Please fill in all fields.";
}
?>