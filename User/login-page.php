<?php
    include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.0/dist/full.css" rel="stylesheet" type="text/css" />
  <title>Login page</title>
  <style>
    main {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;

      /* background: linear-gradient(to top, #1E293B, #0083B0, #4FD1C5); */
      /* background: linear-gradient(to bottom, #1E293B, #0083B0 50%, #4FD1C5); */
      /* background: linear-gradient(to top, #04080F, #00425A, #1B6468); */
      /* background: linear-gradient(to top, #FF85A2, #FFB7B2, #FFE1C2); */
      /* background: linear-gradient(to top, #9B3B5A, #F76D7C, #FFA8BA); */
      /* background: linear-gradient(to top, #FF85A2, #FFB7B2, #FFE1C2); */
      /* background: linear-gradient(to top, #FFC3A0, #FFAFBD, #C881C5); */
      /* background: linear-gradient(to top, #9B3B5A, #B0436E, #8E5185); */
      background: linear-gradient(135deg, #bb6f72, #e0bbb1, #f2c5b9, #9a81d4, #e8a7d6);
      color: white;
    }
    
    /* New CSS to move the label up */
    .label-up {
      transform: translateY(-1.25rem);
      font-size: 0.75rem;
      color: #ccc;
    }


  </style>
  <script>
    // JavaScript to handle label animation on click and focus
    document.addEventListener("DOMContentLoaded", function() {
      const inputs = document.querySelectorAll(".input");
      const labels = document.querySelectorAll(".label");
      
      inputs.forEach(input => {
        input.addEventListener("focus", () => {
          input.previousElementSibling.classList.add("label-up");
        });
        input.addEventListener("blur", () => {
          if (input.value === "") {
            input.previousElementSibling.classList.remove("label-up");
          }
        });
      });
      
      labels.forEach(label => {
        label.addEventListener("click", () => {
          const input = label.nextElementSibling;
          input.focus();
          input.previousElementSibling.classList.add("label-up");
        });
      });
    });
  </script>

</head>
<body>
<header>
  <nav>
  <!-- <div class="navbar text-white" style="background: linear-gradient(to top, #9B3B5A, #F76D7C, #FFA8BA);"> -->
  <!-- <div class="navbar text-white" style="background: linear-gradient(to top, #FF85A2, #FFB7B2, #FFE1C2);"> -->
  <!-- <div class="navbar text-white" style="background: linear-gradient(to top, #FFC3A0, #FFAFBD, #C881C5);"> -->
  <!-- <div class="navbar text-white" style="background: linear-gradient(to top, #9B3B5A, #B0436E, #8E5185);"> -->
  <!-- <div class="navbar text-white" style="background-color: #1A2633;"> -->
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
    <a class="btn btn-ghost normal-case text-xl" href="index.html">Online | Fashion <span style="font-size: 14px;">shop</span></a>
  </div>
  
  <div class="navbar-end hidden lg:flex">
    <ul class="menu menu-horizontal px-1">
      <li><a href="index.html"><strong>Home</strong></a></li>
      <li tabindex="0">
        <li><a href="index.html"><strong>About</strong></a></li>
    </ul>
  </div>
</div>
  </nav>
</header>

<main>
  <div class="hero bg-transparent backdrop-blur-sm h-500 max-w-[64.5rem] border-solid border-2 border-gray-200 rounded-2xl p-10 shadow-2xl text-white">
    <div class="hero-content flex-col lg:flex-row-reverse">

      <div class="text-center lg:text-left">
        <h1 class="text-4xl font-bold">Welcome to our Login Page!</h1>
        <p class="mt-6">Log in securely using your email and password. Forgot your password? No problem! Click "Forgot Password?" for a quick recovery.</p>
        <p class="py-1">New user? Register now and access our services hassle-free.</p>
        <!-- <div class="flex justify-content"><img src="login.jpg" alt=""></div> -->
      </div>

      <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-transparent backdrop-blur-md">
        <div class="card-body">
          <!-- ////// -->
        <form action="welcome.php" method="GET">
          <div class="form-control border-solid border-b-2 border-gray-200 relative ">
            <label class="label absolute ease-in-out cursor-text">
              <span class="text-white text-xl">Email</span>
            </label>
            <input type="email" id="email" name="email" class="input input-bordered bg-transparent border-0 outline-0 focus:outline-none" required>
          </div>

          <div class="form-control border-solid border-b-2 border-gray-200 relative mt-5">
            <label class="label absolute ease-in-out cursor-text">
              <span class="text-white text-xl">Password</span>
            </label>
            <input type="password" id="password" name="password" class="input input-bordered bg-transparent border-0 outline-0 focus:outline-none" required>
          </div>
            <a href="http://localhost/Driving%20License%20Management/User/password.php" class="mt-3 hover:underline">Forgot password?</a>

          <div class="form-control mt-6">
            <input class="btn  rounded-full border-1 border-white" type="submit" value="Login" name="submit">
          </div>
        </form>


          <p>Don't have an account? <a class="hover:underline" href="Register.php">Register</a></p>
        </div>
      </div>
    </div>
  </div>
</main>

<footer class="footer footer-center p-10 text-base-content rounded" style="background: linear-gradient(135deg, #3b1c57, #261b33, #1b2a49);">
  <div class="grid grid-flow-col gap-4">
    <a class="link link-hover">Online | Fashion <span style="font-size: 14px;">shop</span></a> 
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


</body>
</html>