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

if($_GET['id'] != null && $_GET['bookid'] != null)
{
  $bookid = $_GET['bookid'];
  $user_id = $_GET['id'];
  
  // Sql query to be executed
  $s = "INSERT INTO books_assigned VALUES ('$user_id', '$bookid')";
  $result = mysqli_query($conn, $s);
  if($result){
    //Read the url
    $url = 'C:\xampp\htdocs\DBMS PROJECT\LIBRARY MANAGEMENT SYSTEM.pptx';  
    //Clear the cache
    clearstatcache();

    //Check the file path exists or not
    if(file_exists($url)) {

      //Define header information
      header('Content-Description: File Transfer');
      header('Content-Type: application/octet-stream');
      header('Content-Disposition: attachment; filename="'.basename($url).'"');
      header('Content-Length: ' . filesize($url));
      //header("location:store.php?id=$user_id"); 

      //Clear system output buffer
      flush();

      //Read the size of the file
      readfile($url,true);

      //Terminate from the script
      die();
    }
    else{
    echo "File path does not exist.";
    }

    //echo "<script>
    //alert('Book bought successfully!');
    //window.location.href='store.php?id=$user_id';
    //</script>";
  }
  else{
  echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
  }
}
?>