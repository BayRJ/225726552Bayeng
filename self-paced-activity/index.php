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
            text-align: center;
            position: relative;
            border-collapse: collapse;
            background-color: #f6f6f6;
            margin: 0 auto;
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

        th {
            text-align: center;
        }

        a {
            text-decoration: none;
            color: blue;
            font-weight: bold;
            text-transform: uppercase;
            text-align: center;
        }

        td a {
            text-decoration: none;
            color: #A52A2A;
            font-weight: bold;
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <h2>List of Users</h2>

    <table border="1">
        <tr>
            <th class="primary">Name</th>
            <th>Email</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>

        <?php

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<th>" . $row['name'] . "</th>";
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