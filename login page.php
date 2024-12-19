<?php
include('connection.php')
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My_Lawyer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>

<div class="login_container">
  <form action="login" method="POST">
  <div class="login_header ">

   <p>login</p>
  </div>f
  <div class="input_container">git addg
    <label for="email" class="label">email</label>
    <input type="email" name="email" id="" placeholder="enter your email" class="input">    
  </div>
  <div class="input_container">
    <label for="password" class="label">password</label>
    <input type="password" name="password" id="" placeholder="enter your password" class="input">
  </div>
  <button type="submit" class="submit_button h-10 w-11/12">submit</button>
  </form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $ins = ''   
}
?>  

</div>
<div class="signup_link">
  <p>don't have an account? <a href="" class="text-[#3E362E]">signup</a></p>
</div>
   
  </body>
</html>
