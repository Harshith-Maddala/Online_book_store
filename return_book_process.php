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
 

if($_GET['regno'] != null && $_GET['bookid'] != null)
{
    #entry through form
$bookid = $_GET['bookid'];
$regno = $_GET['regno'];
 
// Sql query to be executed
$s = "delete FROM `books_assigned` WHERE registration_no = '$regno' and book_id = '$bookid'";
$result = mysqli_query($conn, $s);
if($result){
    echo "<script>
    alert('The book has been returned successfully!');
    window.location.href='homepage.php';
    </script>";
}
else if(mysqli_errno($conn) == $_POST['regno'])
echo "Reg no. is already entered";
else{
 echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
}
}
?>
<?php
?>