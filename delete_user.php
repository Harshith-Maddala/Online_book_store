<?php
$servername = "127.0.0.1";
$username = "harshith";
$password = "harshith5656";
$database = "dbms_proj";
// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Die if connection was not successful
if (!$conn){
 die("Sorry we failed to connect: ". mysqli_connect_error());
}
else{
 echo "Connection is successful<br>";
} 

if($_GET['id'] != null && $_GET['loginid'] != null)
{
    #entry through form
    $id = $_GET['id'];
    $loginid = $_GET['loginid'];
    // Sql query to be executed
    $s = "update `user_details` set `user_status`='Inactive', `modified_date`= NOW() WHERE id = '$id'";
    $result = mysqli_query($conn, $s);
    if($result){
        echo "<script>
        alert('User has been removed successfully!');
        window.location.href='manageusers.php?id=$loginid';
        </script>";
    }
    else{
    echo "Something went wrong because of this error ---> ". mysqli_error($conn);
    }
}
?>
<?php
?>