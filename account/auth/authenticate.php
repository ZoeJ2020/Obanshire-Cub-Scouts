<?php

// We need to use sessions, 
// session_start is used to check if there is any session information 

// Requiring the db connection
require 'dbConfig.php';
session_start();

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $conn->prepare('SELECT id, password, type FROM obanshire.users WHERE username = ?')) {
    // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
    $stmt->bind_param('s', $_POST['username']);
    $stmt->execute();
    // Store the result so we can check if the account exists in the database.
    $stmt->store_result();
    // If the username exists
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $password, $type);
    
        $stmt->fetch();
        // Account exists, now we verify the password.
        // Note: remember to use password_hash in your registration file to store the hashed passwords.
        if (password_verify($_POST['password'], $password)) {
            // Verification success! User has loggedin!
            // Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['id'] = $id;
            $_SESSION['type'] = $type;

            switch($type){
                case "learner":
                    header('Location: ../../account/dashboard/learner');
                    exit();
                    break;
                
                case "parent":
                    header('Location: ../../account/dashboard/parent');
                    exit();
                    break;

                case "staff":
                    header('Location: ../../account/dashboard/staff');
                    exit();
                    break;

                default:
                    exit();
                    break;
            }

        } else {
            echo 'Incorrect password!';
        }
    }else {
        echo 'Account does not exist!';
    }
    setcookie("username", $_POST['username'], time() + 86400, "/");


}
