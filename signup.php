<?php
include('connection.php');
?>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $_POST['firstname'];
$last_name = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['tele'];
$password = $_POST['password']; 

   $insert = "INSERT INTO clients (nom, prenom, email, tele, mot_de_passe) 
              VALUES( '?', '$last_name', '$email', $phone', $password)";
    
   $stm = mysqli_prepare($conn,$insert);
   mysqli_execute([$first_name,]);
   if($stm){
    echo "your data is inserted correctly $first_name $last_name";
   }else {
    echo "an error has happen while executing";
   }  
   
   

  
}
if(isset($_POST["formClient"])){
    echo "fprm Client ids clicked";
}
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


    <div class="signup_container">
        <!-- Client Login -->
        <form class="client_login" method="post" a  >
            <h1 class="font-bold font-[#3e342e] text-2xl">Normal Client</h1>
            <label for="first name" class="label w-11/12">first name</label>
            <input name="firstname" type="text" placeholder="enter your first name" class="input w-11/12">
            <label for="last name" class="label w-11/12">last name</label>
            <input name="lastname" type="text" placeholder="enter your last name" class="input w-11/12">
            <label for="email" class="label  w-11/12">email</label>
            <input name="email" type="email" placeholder="enter your email name" class="input w-11/12">
            <label for="tele" class="label w-11/12">Tele</label>
            <input name="tele" type="tel" placeholder="enter your phone number" class="input w-11/12">
            <label for="password" class="label w-11/12">password</label>
            <input name="password" type="password" placeholder="enter your password " class="input w-11/12">
            <button type="submit" name="formClient" class="submit_button h-10 w-11/12">submit</button>
</form>




<!-- Lawyer Login -->
<form class="lawyer_login" method="post" >
    <h1 class="font-bold font-[#3e342e] text-2xl ml-52">Lawyer</h1>
    <div></div>
    <div>
        <label for="first name" class="label w-11/12">first name</label>
        <input type="text" placeholder="enter your first name" class="input w-11/12">
    </div>
    <div>
        <label for="last name" class="label w-11/12">last name</label>
        <input type="text" placeholder="enter your last name" class="input w-11/12">
    </div>
    <div>
        <label for="email" class="label  w-11/12">email</label>
        <input type="email" placeholder="enter your email name" class="input w-11/12">
    </div>
    <div>
        <label for="tele" class="label w-11/12">Tele</label>
        <input type="tel" placeholder="enter your phone number" class="input w-11/12">
    </div>
    <div>
        <label for="password" class="label w-11/12">password</label>
        <input type="password" placeholder="enter your password " class="input w-11/12">
    </div>
    <div>
        <label for="biographie" class="label w-11/12">select your speciality</label>
        <select name="" id="" class="input w-11/12">
            <option value="Criminal Lawyer" class="input">Criminal Lawyer</option>
            <option value="Corporate Lawyer" class="input">Corporate Lawyer</option>
            <option value="Family Lawyer" class="input">Family Lawyer</option>
            <option value="Intellectual Property Lawyer" class="input">Intellectual Property Lawyer</option>
            <option value="Immigration Lawyer" class="input">Immigration Lawyer</option>
        </select>
    </div>
    <div>
        <input type="text" placeholder="there is no limit for the characters you can write in your biographie" class="ml-16 bg-transparent input w-96 h-24">
    </div>
    <div></div>
    <button type="submit" name="formLawyer" class="submit_button h-10 w-11/12 ml-36">submit</button>
</form>


</div>




</body>
</html>
