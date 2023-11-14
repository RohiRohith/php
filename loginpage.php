
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    
</head>
<body>

    <div class="loginbox">
        <form action="loginpage.php" method="post">
            <label for="fname">Firstname:</label>
            <input name="fname" type="text" id="fname"><br>
            <label for="lname">Lastname:</label>
            <input name="lname" type="text" id="lname"><br>
            <label for="email">Email:</label>
            <input name="email" type="text" id="email"><br>
            <label for="phone">phone no:</label>
            <input name="phone" type="text" id="phone"><br>
            <label for="password">Password:</label>
            <input name="password" type="password" id="password"><br>
            <label for="conpassword">confirm Password:</label>
            <input name="conpassword" type="password" id="conpassword"><br>
            <input name="sub" type="submit" id="btn" value="Sign Up">
        </form>
    </div>
<?php
  $fname=$_POST["fname"];
  $lname=$_POST["lname"];
  $email=$_POST["email"];
  $phone=$_POST["phone"];
  $password=$_POST["password"];
  $conpass=$_POST["conpassword"];
  $error=array();

  $conn=new mysqli('localhost','root','','test');

  if(empty($fname)||empty($lname)||empty($email)||empty($phone)||empty($password)){
      array_push($error,"all fields are required");
      die();
    }
  if(substr($email, strpos($email, '@') + 1) != 'gmail.com'){
      array_push($error,"invalid email address");
      die();
    }
  if(strlen($password)<6){
      array_push($error,"password must be atleast 6 characters");
      die();
    }
  if($password!=$conpass){
      array_push($error,"passwords do not match");
      die();
    }   

?>
    <div class="errors" >
        <?php
        if(count($error)>0){
           for($i=0;$i<count($error);$i++){
               echo $error[$i]."<br>";
           }
        }
        else{
            if($conn->connect_error){
                die("connection failed:".$conn->connect_error);
            }
            else{
                $stmt=$conn->prepare("insert into testingregestration(fname,lname,email,phone,password) values(?,?,?,?,?)");
                $stmt->bind_param("sssis",$fname,$lname,$email,$phone,$password);
                $stmt->execute();
                echo "registration successfull";
                header("Location: upload.php");
                $stmt->close();
                $conn->close();
                header("Location: upload.php");
                exit();
            }
        }
        ?>
    </div>
</body>
</html>