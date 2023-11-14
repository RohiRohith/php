<?php
include 'connection.php';
?>
<table border="1px" cellpadding="0" cellspacing=0px>
    <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Age</th>
        <th colspan="2">Update</th>
    </tr>
    <?php
    $sql="SELECT * FROM student";
    $result=mysqli_query($conn,$sql);
    if($result){
        
        $i=0;
        while($row=mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $row['fname'];?></td>
                <td><?php echo $row['lname'];?></td>
                <td><?php echo $row['age'];?></td>
                <td><a href="update.php?id=<?php echo $row['id'];?>">update</a></td>
                <td><a href="delete.php?id=<?php echo $row['id'];?>">delete</a></td>
            </tr>
            
            <?php
   
        }
    }
    else{
        ?>
        <tr>
            <td>no record found</td>
        </tr>
        <?php
    }
    ?>

</table>