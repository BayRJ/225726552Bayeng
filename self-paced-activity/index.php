<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Table</title>
</head>

<body>
    <h2>List of Users</h2>
    <?php

    include "db.php";

    $sql = "SELECT * from users";
    $result = $conn->query($sql);

    ?>
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>

        <?php

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['name'] . '</td>';
                echo "<td>" . $row['email'] . '</td>';
                echo '<td><a href="delete.php?id="' . $row['id'] . '>Delete</a></td>';
                echo '<td><a href="update.php?id="' . $row['id'] . '>Update</a></td>';
            }
        } else {
            echo "<tr><td colspan='3'>No Contacts</td></tr> ";
        }

        ?>
    </table>


</body>

</html>