<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add a New User</title>
</head>

<body>
    <h2>Add a New User</h2>

    <?php

    include 'db.php';


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];

        if ($conn->query($sql) === TRUE) {
            $sql = "INSERT INTO users (name,email) VALUES ('$name','$email')";
            echo "New user added successfully";
        } else {
            echo "Failed to add new user";
        }
    } else {
        echo "please fill in the details";
    }

    ?>


    <form method="post" action="add.php">
        Name: <input type="text" name="name" /><br><br>
        Phone: <input type="email" name="email" /><br><br>
        <input type="submit" value="Add Contact">

    </form>
    <a href="index.php">Back to users table</a>

</body>

</html>