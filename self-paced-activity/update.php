<?php

include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM users WHERE id=$id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['name'];
        $email = $row['email'];
    } else {
        echo "No contact found with the ID provided";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $id = $_POST['id'];

    if (!empty($name) && !empty($email)) {
        $sql = "UPDATE users SET name='$name', email='$email' WHERE id=$id";
        if ($conn->query($sql) === TRUE) {

            echo "<div class='modal'><h1>User updated successfully</h1></div>";
            echo "<script>
                let timeoutId; // Variable to store the timeout ID

                function setNewTimeout() {
                    // Clear the previous timeout if it exists
                    if (timeoutId) {
                        clearTimeout(timeoutId);
                    }
                    
                    // Set a new timeout and store its ID
                    timeoutId = setTimeout(() => {
  
                        window.location.href = 'index.php';
                    }, 1000); // 3 seconds
                }
                    setNewTimeout();
                    </script>";
        } else {
            echo "Error updating user: " . $conn->error;
        }
    } else {
        echo "<div class='modal empty-input'><h1>Input fields are empty !!!</h1></div>";
        echo "<script>
                let timeoutId; // Variable to store the timeout ID

                function setNewTimeout() {
                    // Clear the previous timeout if it exists
                    if (timeoutId) {
                        clearTimeout(timeoutId);
                    }
                    
                    // Set a new timeout and store its ID
                    timeoutId = setTimeout(() => {
                        document.querySelector('.empty-input').classList.add('invis');
                    }, 1000); // 3 seconds
                }
                    setNewTimeout();
                    </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <style>
        html {
            box-sizing: border-box;
        }

        body {
            font-family: sans-serif;
            color: #0a0a23;
            width: 100vw;
            height: 100vh;
            overflow: hidden;

        }


        h2,
        p,
        a {
            text-align: center;
            color: #A52A2A;
        }

        form {
            border: 2px dashed #3e3e3e;
            width: 300px;
            margin: 0 auto;
            padding: 20px;


        }

        a {
            text-decoration: none;
            color: blue;
            font-weight: bold;
            text-transform: uppercase;
            display: inline-block;
            margin-top: 30px;
            text-align: center;
            display: inline-block;
        }




        input {
            font-size: 0.875rem;
            width: 100%;
            margin: 0 auto;
            padding: 5px;
            margin-top: 5px;
            border: none;
            background-color: #A52A2A;
            color: white;
            border-radius: 10px;
            padding: 10px 0;
            padding-left: 8px;
        }

        input::placeholder {
            color: white;
            opacity: 0.5;
        }

        .describe {
            text-align: left !important;
            color: #A52A2A;
            font-weight: bold;
            font-size: 1.3rem;
            cursor: pointer;
        }

        input[type="submit"] {
            width: 50%;
            padding: 10px;
            border: none;
            background-color: #A52A2A;
            color: white;
            font-weight: bold;
            font-size: 1rem;
            cursor: pointer;
            margin: auto;
            display: block;

        }

        .container {
            margin-right: 15px;
            margin-left: 7px;
            width: 90%;

        }

        .link {
            text-align: center;
        }

        .modal {
            position: fixed;
            z-index: 1;
            overflow: auto;
            background: radial-gradient(circle at 10% 20%, rgb(85, 149, 27) 0.1%, rgb(183, 219, 87) 90%);
            box-shadow: 0 0 25px 25px rgb(183, 219, 87);
            padding: 30px;
            top: 30%;
            left: 50%;
            margin-top: -100px;
            margin-left: -250px;
            border-radius: 20px 0 20px 0;
        }

        .modal>h1 {
            text-align: center;
            margin-top: 30px;
            color: white;
        }

        .invis {
            display: none;
        }

        .empty-input {
            background: radial-gradient(circle at 10.6% 22.1%, rgb(206, 18, 18) 0%, rgb(122, 21, 21) 100.7%);
            box-shadow: none;
            width: 110%;
            margin: 0;
            top: 300px;
            left: -90px;
            border: 10px solid black;
        }
    </style>
</head>

<body>


    <h2>Update user</h2>

    <form method="post" action="">
        <div class="container">
            <input type="hidden" name="id" value="<?php echo $id; ?>" />
            <label for="name" class="describe">Name: <input id="name" type="text" name="name" placeholder="e.g. Renz Jay Bayeng" value="<?php echo htmlspecialchars($name); ?>" /></label><br><br>
            <label for="email" class="describe">Email: <input id="email" type="email" name="email" placeholder="e.g. renzjaybayeng@gmail.com" value="<?php echo htmlspecialchars($email); ?>" /></label><br><br>


            <input type="submit" value="Update Contact" />
        </div>


    </form>
    <div class="link">

        <a href="index.php" class="link">Back to users table</a>
    </div>


</body>

</html>