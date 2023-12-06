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

$userid; 
if($_GET['id'] != null)
{
  #get user id from url
  $userid = $_GET['id'];

  //display user data
  $sql = "SELECT * FROM user_details where id = '$userid'";
  // execute above select query and get userdeatails to display
  $result = mysqli_query($conn, $sql);
  
  // get count to fetch record
  $num = mysqli_num_rows($result);
  
  // if reocrd found  
  if($num> 0){
    $profiledata="<table style='width:100%;'>
    <tr>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Age</th>
      <th>Occupation</th>
      <th>Gender</th>
      <th>Account created on</th>
    </tr>";
  // We can fetch in a better way using the while loop
  while($row = mysqli_fetch_assoc($result)){
    $profiledata=$profiledata."<tr>
      <td>".$row['first_name']."</td>
      <td>".$row['last_name']."</td>
      <td>".$row['email']."</td>
      <td>".$row['age']."</td>
      <td>".$row['occupation']."</td>
      <td>".$row['gender']."</td>
      <td>".$row['created_date']."</td>
    </tr>";
  } 
  echo "</table>";
  }
  else{
    $profiledata="Profile not found";
  }

  //display books data of user
  $sql = "SELECT * FROM `book_info` WHERE book_id in (select book_id from books_assigned where user_id = $userid)";
  // execute above select query and get userdeatails to display
  $result = mysqli_query($conn, $sql);
  
  // get count to fetch record
  $num = mysqli_num_rows($result);
  
  // if reocrd found  
  if($num> 0){
    $booksdata="<table style='width:100%;'>
    <tr>
      <th>Book Name</th>
      <th>Author</th>
      <th>User Ratings</th>
      <th>Reviews</th>
      <th>Price</th>
      <th>Year</th>
      <th>Genre</th>
    </tr>";
  // We can fetch in a better way using the while loop
  while($row = mysqli_fetch_assoc($result)){
    $booksdata=$booksdata."<tr>
      <td>".$row['book_name']."</td>
      <td>".$row['author']."</td>
      <td>".$row['user_rating']."</td>
      <td>".$row['reviews']."</td>
      <td>".$row['price']."</td>
      <td>".$row['year']."</td>
      <td>".$row['genre']."</td>
    </tr>";
  } 
  echo "</table>";
  }
  else{
    $booksdata="No books bought yet";
  }
}
?>
 <html>
  <head>
    <link
      href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap"
      rel="stylesheet"
    />
    <meta
      name="viewport"
      content="width=device-width,initial-scale=1,maximum-scale=1"
    />
    <style>
      body {
        font-family: "Inter", sans-serif;
      }
      table, th, td {
        border: 1px solid black;
      }
    </style>
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.js"
      defer
    ></script>
    <title>Profile</title>
  </head>

  <body>
    <?php echo $profiledata ?><br>
    <?php echo $booksdata ?>  
    <div class="mx-auto max-w-xs">      
      <input type="button" value = "Back" onclick="location.href='dashboard.php?id=<?php echo $userid?>';"
            class="mt-5 tracking-wide font-semibold bg-indigo-500 text-gray-100 w-full py-4 rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
    </div><br>
  </body>
 <!-- <script>
/* YOU DONT NEED THESE, these are just for the popup you see */
function closeTreactPopup(){ 
  document.querySelector(".treact-popup").classList.add("hidden");
}
function openTreactPopup(){ 
  document.querySelector(".treact-popup").classList.remove("hidden");
}
document.querySelector(".close-treact-popup").addEventListener("click", closeTreactPopup);
setTimeout(openTreactPopup, 3000)

  </script>-->
</html>