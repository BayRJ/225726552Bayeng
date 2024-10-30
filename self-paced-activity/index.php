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
            width: 100vw;
            height: 100vh;
            text-align: center;
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

        tbody .action:hover {
            background-color: yellow;

        }

        th {
            text-align: center;
        }

        a {
            text-decoration: none;
            color: blue;
            font-weight: bold;
            text-transform: uppercase;
            display: inline-block;
            margin-top: 30px;
        }

        td a {
            text-decoration: none;
            color: #A52A2A;
            font-weight: bold;
            text-transform: uppercase;
            vertical-align: middle;
            margin-top: 0;
        }
    </style>
    <link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">
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
                echo '<td class="action"><i class="fa fa-trash" aria-hidden="true"></i>
<a href="delete.php?id=' . $row['id'] . '">Delete</a></td>';
                echo '<td class="action"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>
<a href="update.php?id=' . $row['id'] . '">Update</a></td>';
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4' style='color:#A52A2A; font-size: 1em; font-weight: bold; text-transform:uppercase;'>No Contacts !</td></tr>";
        }

        ?>
    </table>
    <a href="add.php">
        <i class="fa fa-user-plus "></i> Add new user</a>
</body>

</html>