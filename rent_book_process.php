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
$bookid;
$price;
if($_GET['id'] != null && $_GET['bookid'] != null)
{
    $userid = $_GET['id'];
    $bookid = $_GET['bookid'];

    $sql = "SELECT * FROM `book_info` WHERE book_id in (select book_id from books_assigned WHERE `user_id` = $userid and `book_id` = $bookid)";
    $result = mysqli_query($conn, $sql);

    // Find the number of records returned
    $num = mysqli_num_rows($result);
    if($num>0){
        while($row = mysqli_fetch_assoc($result)){
            $price=$row['price'];
        }
        $payment="Book cost: $price, already payment done, download here...";
    }
    else{
        $sql = "SELECT * FROM `book_info` WHERE `book_id` = $bookid";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $price=$row['price'];
        }
        $payment="Book cost: $price, Payment is under process...";
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
    <title>Buy a book</title>
  </head>

  <body>
    <div class="mx-auto max-w-xs">
        <?php echo $payment ?>
        <input type="button" value = "Download" onclick="location.href='download.php?id=<?php echo $userid?>&bookid=<?php echo $bookid?>';"
            class="mt-5 tracking-wide font-semibold bg-indigo-500 text-gray-100 w-full py-4 rounded-lg hover:bg-indigo-700 transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
        <input type="button" value = "Cancel" onclick="location.href='store.php?id=<?php echo $userid?>';"
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