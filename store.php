<?php
$servername = "127.0.0.1";
$username = "harshith";
$password = "harshith5656";
$database = "dbms_proj";
// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);
$books="";
// Die if connection was not successful
if (!$conn){
 die("Sorry we failed to connect: ". mysqli_connect_error());
}
 
if($_GET['id'] != null)
{
  $userid = $_GET['id'];
  // get all available books to show in table
  $sql = "SELECT * FROM `book_info` where book_status = 'Active'";
  $result = mysqli_query($conn, $sql);
  // Find the number of records returned
  $num = mysqli_num_rows($result);
  if($num> 0){
    $books="<table style='width:100%'>
    <tr>
      <th>Book Name</th>
      <th>Author</th>
      <th>User Ratings</th>
      <th>Reviews</th>
      <th>Price</th>
      <th>Year</th>
      <th>Genre</th>
      <th>Action</th>
    </tr>";
 
  // We can fetch in a better way using the while loop
  while($row = mysqli_fetch_assoc($result)){
    $books=$books."<tr>
    <td>".$row['book_name']."</td>
    <td>".$row['author']."</td>
    <td>".$row['user_rating']."</td>
    <td>".$row['reviews']."</td>
    <td>".$row['price']."</td>
    <td>".$row['year']."</td>
    <td>".$row['genre']."</td>
    <td><input type='Button' value='Download' onclick=\"location.href='rent_book_process.php?id=$userid&bookid=".$row['book_id']."'\"></td>
  </tr>"; 
  } 
  echo "</table>";  
  }
  else{
      echo "No bookes found for buying";
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
    <title>Store</title>
  </head>

  <body>
  <br><?php echo $books ?><br>
    <div class="mx-auto max-w-xs">      
      <input type="button" value = "Back" onclick="location.href='dashboard.php?id=<?php echo $userid?>';"
          class="mt-5 tracking-wide font-semibold bg-indigo-500 text-gray-100 w-full py-4 rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
    </div>
    <!--<div class="max-w-screen-xl m-0 sm:m-20 bg-white shadow sm:rounded-lg flex justify-center flex-1">
      <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
        <div class="mt-12 flex flex-col items-center">
          <div class="w-full flex-1 mt-8">
            <div class="mx-auto max-w-xs">
            <form action="" method="post">
              
            </form>
            </div>
          </div>
        </div>
      </div>
      <div class="flex-1 bg-indigo-100 text-center hidden lg:flex">
        <div
          class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat"
          style="background-image: url('https://storage.googleapis.com/devitary-image-host.appspot.com/15848031292911696601-undraw_designer_life_w96d.svg');"
        ></div>
      </div>
    </div>-->
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