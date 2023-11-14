<!DOCTYPE html>
<html>
<head>
    <title>Signup</title>
</head>
<body>
   <h2>Signup</h2>
    <form action="practice.php" method="post">
        Name: <input type="text" name="Name" required><br><br>
        Password: <input type="password" name="Password" id="password" required><br><br>
        <input type="submit" value="Signup">
    </form>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $name = $_POST['Name'];
            $password = $_POST['Password'];

            $mysqli = new mysqli('localhost', 'root','', 'database');

            if ($mysqli->connect_error) {
                die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
            } else {
                echo 'Connected successfully';
            }

            $sql = "SELECT * FROM users where name = '$name'";
            $result = $mysqli ->query($sql);

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $storedPassword = $row['password'];

                if ($password == $storedPassword) {
                    // Password is correct
                    echo "Login Successful";
                    $_SESSION['user_id'] = $row['id']; // You might want to store more user information in the session
        
                    // header("Location: dashboard.php"); // Redirect to the dashboard or another page after successful login
                    exit();
                } 
                else {
                    echo "Incorrect password";
                }
            }

            if($result == $password){
                echo "Login Successful";

            }
        }