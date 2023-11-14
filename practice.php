<?php
session_start();
$mysqli = new mysqli('localhost', 'root','', 'database');

if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
} else {
    echo 'Connected successfully';
}

$name = $_POST['signupName'];
$email = $_POST['signupEmail'];
$password = $_POST['signupPassword'];


$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

if ($mysqli->query($sql) === TRUE) {
    echo "New record created successfully";
    header("Location: login.php");
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;

}

$mysqli->close();
?>
