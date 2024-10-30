<?php

include 'db.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];

    if (!empty($name) && !empty($email)) {
        $sql = "INSERT INTO users (name,email) VALUES ('$name','$email')";

        if ($conn->query($sql) === TRUE) {

            echo "<div class='modal success'><h1>New user added successfully</h1></div>";
            echo "<script>
                let timeoutId; // Variable to store the timeout ID

                function setNewTimeout() {
                    // Clear the previous timeout if it exists
                    if (timeoutId) {
                        clearTimeout(timeoutId);
                    }
                    
                    // Set a new timeout and store its ID
                    timeoutId = setTimeout(() => {
                        document.querySelector('.success').classList.add('invis');
                    }, 1000); // 3 seconds
                }
                    setNewTimeout();
                    </script>";
        } else {
            echo "Failed to add new user";
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
    <title>Add a New User</title>
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
    <link rel="stylesheet" href="./font-awesome/css/font-awesome.min.css">

</head>

<body>
    <h2>Add a New User</h2>
    <p>Please fill in the necessary details</p>
    <form method="post" action="add.php">
        <div class="container">
            <label for="name" class="describe">Name: <input id="name" type="text" name="name" placeholder="e.g. Renz Jay Bayeng" /></label><br><br>
            <label for="email" class="describe">Email: <input id="email" type="email" name="email" placeholder="e.g. renzjaybayeng@gmail.com" /></label><br><br>


            <input type="submit" value="Add Contact" />
        </div>


    </form>
    <div class="link">

        <a href="index.php" class="link"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>
            Back to users table</a>
    </div>

</body>

</html>