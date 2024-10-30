<?php

include "db.php";

$sql = "SELECT * from users";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Table</title>

    <style>
        html {
            box-sizing: border-box;
        }

        body {
            font-family: sans-serif;
            color: #0a0a23;
        }

        h2 {
            color: #800020;
            text-align: center;
            margin-top: 100px;
        }

        table {
            text-align: left;
            position: relative;
            border-collapse: collapse;
            background-color: #f6f6f6;
        }

        /* Spacing */
        td,
        th {
            border: 1px solid #999;
            padding: 20px;
        }

        th {
            background: brown;
            color: white;
            border-radius: 0;
            position: sticky;
            top: 0;
            padding: 10px;
        }

        .primary {
            background-color: #000000
        }

        tfoot>tr {
            background: black;
            color: white;
        }

        tbody>tr:hover {
            background-color: #ffc107;
        }
    </style>
</head>

<body>
    <h2>List of Users</h2>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>

        <?php

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo '<td><a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';
                echo '<td><a href="update.php?id=' . $row['id'] . '">Update</a></td>';
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No Contacts</td></tr>";
        }

        ?>
    </table>
    <a href="index.php">Back to users table</a>
</body>

</html>