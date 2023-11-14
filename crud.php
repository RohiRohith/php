<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD</title>
</head>
<body>
    <div>
        <form action="crud.php" method="post">
            <label for="fname">firstName : </label>
            <input type="text" name="fname" id="fname"><br>
            <label for="lname">lastName : </label>
            <input type="text" name="lname" id="lname"><br>
            <label for="age">age : </label>
            <input type="number" name="age" id="age"><br>
            <input type="submit" name="submit" value="submit">
            <button><a href="crudisplay.php">display</a></button>
        </form>
    </div>
</body>
<?php
if($conn)
{
    echo "connection done.<br>";

}
else{
    echo "connection failed";
}
if(isset($_POST['submit']))
{
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $age=$_POST['age'];
    $sql="INSERT INTO student (fname, lname, age) VALUES ('$fname','$lname','$age')";
    $query=mysqli_query($conn,$sql);
    if($query)
    {
        ?>
        <script type="text/javascript">
            alert("data inserted");
        </script>
        <?php
    }
    else{
        echo "data not inserted";
    }
}
?>