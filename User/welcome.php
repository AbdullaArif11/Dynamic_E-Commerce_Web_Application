<?php
include("connection.php");

if (isset($_GET['email']) && isset($_GET['password'])) {
    $email = $_GET['email'];
    $password = $_GET['password'];

    // Validate email and password against the database
    $sql = "SELECT * FROM user WHERE Email = '$email' AND password = '$password'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if ($count != 1) {
        // Email or password is invalid, redirect back to login-page.php
        header("Location: login-page.php");
        exit();
    }
} else {
    // Redirect back to login-page.php if email or password parameters are missing
    header("Location: login-page.php");
    exit();
}

if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: login-page.php");
  exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.0/dist/full.css" rel="stylesheet" type="text/css" />
  <title>Login Successful</title>
</head>
<body style="background: linear-gradient(135deg, #fff5f5, #fffaf0, #fffaf0, #f5f3ff, #faf5f7);">
<header>
  <nav>
  <div class="navbar text-white" style="background: linear-gradient(135deg, #bb6f72, #e0bbb1, #f2c5b9, #9a81d4, #e8a7d6);">
  <div class="navbar-start">
    <div class="dropdown">
      <label tabindex="0" class="btn btn-ghost lg:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
      </label>
      <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
        <li><a href="index.html">Home</a></li>
        <li><a href="index.html">About</a></li>
      </ul>
    </div>
    <a href="index.html" class="logo"><img class="w-10" src="images/logo2.jpg"></a>
    <a href="index.html" class="btn btn-ghost normal-case text-xl">Online | Fashion <span style="font-size: 14px;">shop</span></a>
  </div>
  <div class="navbar-center hidden lg:flex">
    <ul class="menu menu-horizontal px-1">
      <li><a href="index.html" style="color: #000"><strong>Home</strong></a></li>
      <li><a href="index.html" style="color: #000"><strong>About</strong></a></li>
    </ul>
  </div>
  <div class="navbar-end">
    <a href="?logout" class="btn border-1 border-white text-white bg-gradient-to-r from-purple-800 via-purple-600 to-purple-900">Logout</a>


  </div>
</div>
  </nav>
</header>
<!-- //////////////////////// -->
<header class="w-full m-6 md:py-6 pb-5 hero bg-transparent backdrop-blur-sm border-solid border-2 border-gray-200 rounded-2xl shadow-2xl">
    <section class="flex flex-col-reverse md:flex-row gap-8 lg:gap-16 justify-center items-center md:max-h-[873px]">
      <div class="text-center">
        <p class="text-3xl font-medium">Welcome! Get ready to elevate your style with our fabulous collection.</p>
        <h3 class="text-6xl font-bold mt-11 mb-20">Purchase TK 3000 or<br>above & get <span class="text-[#E527B2]">20% off</span></h3>
        <div class="flex gap-4 justify-center items-center">
          <p class="font-medium">Use Promo Code</p>
          <button class="btn bg-[#E527B2] text-white py-3 px-6">SELL200</button>
        </div>
      </div>
      <div>
        <img class="img-responsive max-h-[708px]" src="./images/Summer 1.png">
      </div>
    </section>
  </header>

<main class="max-w-[90rem] mx-auto py-10" >
    <div class="flex flex-col md:flex-row gap-4 md:ml-16">
      <div>
        <section class="py-12">
          <h3 class="text-center md:text-start my-8 text-[2.5rem] font-semibold">Kids Collection</h3>
          <div class="grid gap-7 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">

<!-- All cards for kids -->
              <?php
              $servername = "localhost";
              $username = "root"; 
              $password = "";
              $database = "online_fashion_store";

              $conn = new mysqli($servername, $username, $password, $database);

              if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
              }

              $sql = "SELECT title, price, sell_quantity, sample FROM kids_collection";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    echo "<div class='card max-w-[19rem] glass shadow-xl border-solid border-white'>";
                    echo "<figure><img src='data:image/jpeg;base64," . base64_encode($row['sample']) . "' alt='" . $row['title'] . "' /></figure>";
                    echo "<div class='card-body'>";

                      echo"<div class='rating flex justify-center'>";
                      echo "<input type='radio' name='rating-21' class='mask mask-star-2 bg-orange-400'>";
                      echo "<input type='radio' name='rating-21' class='mask mask-star-2 bg-orange-400' checked>";
                      echo "<input type='radio' name='rating-21' class='mask mask-star-2 bg-orange-400'>";
                      echo "<input type='radio' name='rating-21' class='mask mask-star-2 bg-orange-400'>";
                      echo "<input type='radio' name='rating-21' class='mask mask-star-2 bg-orange-400'>";
                      echo "</div>";

                      echo "<h2 class='card-title'>" . $row['title'] . "</h2>";
                      echo "<p>Price: " . $row['price'] . "tk</p>";
                      echo "<p>" . $row['sell_quantity'] . " already sold</p>";
                      echo "<div class='card-actions justify-end'>";
                        echo "<button class='btn btn-primary border-white text-white' style='background: linear-gradient(135deg, #bb6f72, #e0bbb1, #f2c5b9, #9a81d4, #e8a7d6);'><strong>Add to Buy!</strong></button>";
                      echo "</div>";
                    echo "</div>";
                  echo "</div>";
                  }
              } else {
                  echo "0 results";
              }
              $conn->close();
            ?>
            
          </div>
        </section>

        <section class="py-12">
          <h3 class="text-center md:text-start my-8 text-[2.5rem] font-semibold">Teen Collection</h3>
          <div class="grid gap-7 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
<!-- All cards for Teen -->
            <?php
              $servername = "localhost";
              $username = "root"; 
              $password = "";
              $database = "online_fashion_store";

              $conn = new mysqli($servername, $username, $password, $database);

              if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
              }

              $sql = "SELECT title, price, sell_quantity, sample FROM teen_collection";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    echo "<div class='card max-w-[19rem] glass shadow-xl border-solid border-white'>";
                    echo "<figure><img src='data:image/jpeg;base64," . base64_encode($row['sample']) . "' alt='" . $row['title'] . "' /></figure>";
                    echo "<div class='card-body'>";

                      echo"<div class='rating flex justify-center'>";
                      echo "<input type='radio' name='rating-21' class='mask mask-star-2 bg-orange-400'>";
                      echo "<input type='radio' name='rating-21' class='mask mask-star-2 bg-orange-400' checked>";
                      echo "<input type='radio' name='rating-21' class='mask mask-star-2 bg-orange-400'>";
                      echo "<input type='radio' name='rating-21' class='mask mask-star-2 bg-orange-400'>";
                      echo "<input type='radio' name='rating-21' class='mask mask-star-2 bg-orange-400'>";
                      echo "</div>";

                      echo "<h2 class='card-title'>" . $row['title'] . "</h2>";
                      echo "<p>Price: " . $row['price'] . "tk</p>";
                      echo "<p>" . $row['sell_quantity'] . " already sold</p>";
                      echo "<div class='card-actions justify-end'>";
                        echo "<button class='btn btn-primary border-white text-white' style='background: linear-gradient(135deg, #bb6f72, #e0bbb1, #f2c5b9, #9a81d4, #e8a7d6);'><strong>Add to Buy!</strong></button>";
                      echo "</div>";
                    echo "</div>";
                  echo "</div>";
                  }
              } else {
                  echo "0 results";
              }
              $conn->close();
            ?>

          </div>
        </section>

        <section class="py-12">
          <h3 class="text-center md:text-start my-8 text-[2.5rem] font-semibold">Men Collection</h3>
          <div class="grid gap-7 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
<!-- All cards for men -->
            <?php
              $servername = "localhost";
              $username = "root"; 
              $password = "";
              $database = "online_fashion_store";

              $conn = new mysqli($servername, $username, $password, $database);

              if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
              }

              $sql = "SELECT title, price, sell_quantity, sample FROM men_collection";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    echo "<div class='card max-w-[19rem] glass shadow-xl border-solid border-white'>";
                    echo "<figure><img src='data:image/jpeg;base64," . base64_encode($row['sample']) . "' alt='" . $row['title'] . "' /></figure>";
                    echo "<div class='card-body'>";

                      echo"<div class='rating flex justify-center'>";
                      echo "<input type='radio' name='rating-21' class='mask mask-star-2 bg-orange-400'>";
                      echo "<input type='radio' name='rating-21' class='mask mask-star-2 bg-orange-400' checked>";
                      echo "<input type='radio' name='rating-21' class='mask mask-star-2 bg-orange-400'>";
                      echo "<input type='radio' name='rating-21' class='mask mask-star-2 bg-orange-400'>";
                      echo "<input type='radio' name='rating-21' class='mask mask-star-2 bg-orange-400'>";
                      echo "</div>";

                      echo "<h2 class='card-title'>" . $row['title'] . "</h2>";
                      echo "<p>Price: " . $row['price'] . "tk</p>";
                      echo "<p>" . $row['sell_quantity'] . " already sold</p>";
                      echo "<div class='card-actions justify-end'>";
                        echo "<button class='btn btn-primary border-white text-white' style='background: linear-gradient(135deg, #bb6f72, #e0bbb1, #f2c5b9, #9a81d4, #e8a7d6);'><strong>Add to Buy!</strong></button>";
                      echo "</div>";
                    echo "</div>";
                  echo "</div>";
                  }
              } else {
                  echo "0 results";
              }
              $conn->close();
            ?>

          </div>
        </section>

        <section class="py-12">
          <h3 class="text-center md:text-start my-8 text-[2.5rem] font-semibold">Women Collection</h3>
          <div class="grid gap-7 grid-cols-1 md:grid-cols-2 lg:grid-cols-3">
<!-- All cards for women -->
            <?php
              $servername = "localhost";
              $username = "root"; 
              $password = "";
              $database = "online_fashion_store";

              $conn = new mysqli($servername, $username, $password, $database);

              if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
              }

              $sql = "SELECT title, price, sell_quantity, sample FROM women_collection";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                    echo "<div class='card max-w-[19rem] glass shadow-xl border-solid border-white'>";
                    echo "<figure><img src='data:image/jpeg;base64," . base64_encode($row['sample']) . "' alt='" . $row['title'] . "' /></figure>";
                    echo "<div class='card-body'>";

                      echo"<div class='rating flex justify-center'>";
                      echo "<input type='radio' name='rating-21' class='mask mask-star-2 bg-orange-400'>";
                      echo "<input type='radio' name='rating-21' class='mask mask-star-2 bg-orange-400' checked>";
                      echo "<input type='radio' name='rating-21' class='mask mask-star-2 bg-orange-400'>";
                      echo "<input type='radio' name='rating-21' class='mask mask-star-2 bg-orange-400'>";
                      echo "<input type='radio' name='rating-21' class='mask mask-star-2 bg-orange-400'>";
                      echo "</div>";

                      echo "<h2 class='card-title'>" . $row['title'] . "</h2>";
                      echo "<p>Price: " . $row['price'] . "tk</p>";
                      echo "<p>" . $row['sell_quantity'] . " already sold</p>";
                      echo "<div class='card-actions justify-end'>";
                        echo "<button class='btn btn-primary border-white text-white' style='background: linear-gradient(135deg, #bb6f72, #e0bbb1, #f2c5b9, #9a81d4, #e8a7d6);'><strong>Add to Buy!</strong></button>";
                      echo "</div>";
                    echo "</div>";
                  echo "</div>";
                  }
              } else {
                  echo "0 results";
              }
              $conn->close();
            ?>

          </div>
        </section>

      </div>
      <div class="m-0 mt-44 flex flex-col ">
        <div class="bg-white max-w-md p-4">
          <h3 class="font-medium text-2xl my-4">Have coupon?</h3>
          <div class="flex justify-center items-center mb-5">
            <input id="promo-code" type="text" placeholder="Coupon code" class="m-0 w-64 h-14 rounded-s-lg focus:outline-none focus:border-black focus:ring-black focus:ring-1 ">
            <button id="btn-apply" class="btn bg-pink-600 p-4 text-white m-0 rounded-e-lg h-[58px] rounded-s-[0] ">Apply</button>
          </div>
        </div>

        <!-- please add there my all selected cards and also show the total price or selected item list -->
        <div class="bg-white max-w-md p-4 mt-6 font-medium text-2xl">
          <div id="item-box"></div>
          <hr class="h-2 mt-4">

          <h3 class="font-medium">Total price: <span class="text-gray-500"><span id="Total-price">0.00</span> TK</span></h3>
          <h3 class="font-medium">Discount : <span class="text-gray-500"><span id="Discount">0.00</span> TK</span></h3>
          <h3 class="font-medium mb-3">Total: <span class="text-gray-500"><span id="Total">0.00</span> TK</span></h3>
          <button id="btn-buy" class="btn bg-pink-600 p-4 text-white m-0 h-14 w-full" onclick="my_modal_2.showModal()">Make Purchase</button>
          
          <dialog id="my_modal_2" class="modal">
            <form method="dialog" class="modal-box text-center">
              <div class="flex justify-center">
                <img src="./images/congo.png" alt="">
              </div>
              <h3 class="font-extrabold text-4xl">Congratulations</h3>
              <p class="text-slate-500 text-xl font-extralight my-3">You Purchase the product</p>
              <button id="go-home" class="btn bg-pink-600 text-white">Go Home</button>
            </form>
            <form method="dialog" class="modal-backdrop">
              <button>close</button>
            </form>
          </dialog>
        </div>
      </div>
    </div>
  </main>

<footer class="footer footer-center p-10 text-base-content rounded" style="background: linear-gradient(135deg, #3b1c57, #261b33, #1b2a49);">
  <div class="grid grid-flow-col gap-4">
    <a class="link link-hover">Online Fashion Store</a> 
  </div> 
  <div>
    <div class="grid grid-flow-col gap-4">
      <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path></svg></a> 
      <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path></svg></a> 
      <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current"><path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path></svg></a>
    </div>
  </div> 
  <div>
    <p>Copyright © 2023 - All right reserved .</p>
  </div>
</footer>

<script>
  // Initialize total price, discount, and total variables
  var totalPrice = 0;
  var discount = 0;
  var total = 0;

  function addItem(title, price) {
    var newItem = document.createElement('div');
    newItem.innerHTML = "<p>" + title + " - " + price + "</p>";

    document.getElementById('item-box').appendChild(newItem);

    // Extract the numeric part of the price
    var numericPrice = parseFloat(price.match(/\d+(\.\d+)?/)[0]);

    // Add the price to the total price
    totalPrice += numericPrice;

    // Update the total price element
    document.getElementById('Total-price').innerText = totalPrice.toFixed(2);

    // Check if the total price is 3000 or above
    if (totalPrice >= 3000) {
      applyDiscount();
    }
}

  function applyDiscount() {
    // Calculate the discount
    discount = totalPrice * 0.2;
    
    // Update the discount element
    document.getElementById('Discount').innerText = discount.toFixed(2);

    // Calculate the total after discount
    total = totalPrice - discount;

    // Update the total element
    document.getElementById('Total').innerText = total.toFixed(2);
  }

  function clearItems() {
    // Clear the item box
    document.getElementById('item-box').innerHTML = "";

    // Reset total price, discount, and total
    totalPrice = 0;
    discount = 0;
    total = 0;

    // Update the corresponding HTML elements
    document.getElementById('Total-price').innerText = totalPrice.toFixed(2);
    document.getElementById('Discount').innerText = discount.toFixed(2);
    document.getElementById('Total').innerText = total.toFixed(2);
  }

  // Add event listener to the "Make Purchase" button
  document.getElementById('btn-buy').addEventListener('click', function() {
    clearItems();
  });

  // Add event listeners to the "Add to Buy" buttons
  var addToBuyButtons = document.querySelectorAll('.btn.btn-primary');
  addToBuyButtons.forEach(function(button) {
    button.addEventListener('click', function() {
      var title = this.parentNode.parentNode.querySelector('.card-title').innerText;
      var price = this.parentNode.parentNode.querySelector('p').innerText;

      addItem(title, price);
    });
  });
</script>


</body>
</html>