<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "student_user";
$db = mysqli_connect($host,$user,$pass,$db); 
?>

<?php

if(isset($_GET['deletedid'])){
    $deleted_id = $_GET['deletedid'];

    $sql = "DELETE FROM student WHERE id = $deleted_id";
    if(mysqli_query($db,$sql) == TRUE){
        header("location:database.php");
    } 
}


?>

<table border =  "1" style = "border-collapse: collapse;">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
    </tr>
    
    <?php
    $student = $db->query("select * from student");
    while(list($_id,$_name,$_email) = $student -> fetch_row()){
        echo "<tr>
                <td>$_id</td>
                <td>$_name</td>
                <td>$_email</td>
                <td><a href = 'database.php?deletedid=$_id'> Delete
            </a>
            </td>
                
            </tr>";
            
    }
    
    ?>
</table>