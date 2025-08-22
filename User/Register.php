<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@3.5.0/dist/full.css" rel="stylesheet" type="text/css" />
  <title>Register page</title>
  <style>
    main {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background: linear-gradient(to top, #04080F, #00425A, #1B6468);
      color: white;
    }
    
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
<body >
<header>
  <nav>
  <div class="navbar" style="background-color: #1A2633;">
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
    <a href="" class="logo"><img class="w-10" src="images/logo2.jpg"></a>
    <a class="btn btn-ghost normal-case text-xl">Online | Fashion <span style="font-size: 14px;">shop</span></a>
  </div>
  
  <div class="navbar-end hidden lg:flex">
    <ul class="menu menu-horizontal px-1">
    <li><a href="index.html">Home</a></li>
    <li><a href="index.html">About</a></li>
    </ul>
  </div>
</div>
  </nav>
</header>
<main >
 <div class="hero bg-transparent backdrop-blur-sm h-[600px] max-w-[30rem] border-solid border-2 border-gray-200 rounded-2xl p-10 shadow-2xl text-white">
 <form action="Register-connection.php" method="POST" onsubmit="return validateForm()">

  <div class="form-group my-3">
    <label>Email:</label>
    <input type="email" name="Email" class="form-control w-[25rem]" autocomplete="off" required>
  </div>

    <div class="form-group my-3">
      <label>Full Name:</label>
      <input type="text" name="Name" class="form-control w-[25rem]" autocomplete="off">
    </div>

    <div class="form-group my-3">
      <label>Surname:</label>
      <input type="text" name="surname" class="form-control w-[25rem]" autocomplete="off">
    </div>

    <div class="form-group my-3">
      <label>Address:</label>
      <input type="text" name="address" class="form-control w-[25rem]" autocomplete="off">
    </div>

    <div class="form-group my-3">
      <label>Billing Address:</label>
      <input type="text" name="billing_address" class="form-control w-[25rem]" autocomplete="off">
    </div>

    <div class="form-group my-3">
      <label>Date of Birth:</label>
      <input type="date" name="birth_date" class="form-control w-[25rem]" autocomplete="off">
    </div>

    <div class="form-group my-3">
        <label>Set a new password:</label>
        <input type="password" name="pass" id="password" class="form-control w-[25rem]" autocomplete="off" required>
    </div>

    <div class="mt-10 flex justify-center">
      <button type="submit" class="btn w-[15rem] rounded-full border-1 border-white text-white">Sign up</button>
    </div>

  </form>
 </div>
</main>
<br>
  <script>
    function validateForm() {
      var inputs = document.getElementsByTagName('input');
      var select = document.getElementsByTagName('select')[0];
      var incompleteFields = [];
      
      for (var i = 0; i < inputs.length; i++) {
        if (inputs[i].type === 'text' && inputs[i].value === '') {
          inputs[i].classList.add('error');
          incompleteFields.push(inputs[i].name);
        } else {
          inputs[i].classList.remove('error');
        }
      }
      if (incompleteFields.length > 0) {
        var message = 'Please fill in the following fields:\n';
        for (var k = 0; k < incompleteFields.length; k++) {
          message += '- ' + incompleteFields[k] + '\n';
        }
        alert(message);
        return false;
      }
      alert('Congratulations! You have successfully registered.');
      return true;
    }
  </script>

<footer class="footer footer-center p-10 text-base-content rounded" style="background-color: black;">
  <div class="grid grid-flow-col gap-4">
    <a class="link link-hover">Online Fashion Shop</a> 
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