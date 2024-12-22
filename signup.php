<?php
include('connection.php');
?>

<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
    // common info between client & lawyer
    $firstName = $_POST['firstname']; 
    $lastName = $_POST['lastname']; 
    $email = $_POST['email']; 
    $tele = $_POST['tele']; 
    $password = $_POST['password'];

    // info only for lawyer
    $speciality = $_POST['speciality']; 
    $biography = $_POST['biography']; 

   $password_hashed = password_hash($password, PASSWORD_DEFAULT);
    if ($_POST['signup_type'] === "client") {
        echo "client is selected";
        $insert_client = $conn->prepare( "insert into clients (nom, prenom, email, tele, mot_de_passe) values (?, ?, ?, ?,?) ");
        $insert_client->bind_param("sssss", $firstName, $lastName, $email, $tele, $password_hashed);
        $insert_client->execute();
        $_SESSION['user_id'] = $conn->insert_id;
        $_SESSION['role'] = "client";   
        $_SESSION['name'] = $firstname.' '.$lastname;     
        $insert_client->close();  

    } elseif ($_POST['signup_type'] === "lawyer") {
        $insert_lawyer = $conn->prepare( "insert into avocat (nom, prenom, email, tele, mot_de_passe, specialité, biographie) values (?, ?, ?, ?, ?, ?, ?) ");
        $insert_lawyer->bind_param("sssssss", $firstName, $lastName, $email, $tele, $password_hashed, $speciality, $biography);
        $insert_lawyer->execute();
        $_SESSION['user_id'] = $conn->insert_id;    
        $_SESSION['role'] = "lawyer";   
        $_SESSION['name'] = $firstname.' '.$lastname;
        $insert_lawyer->close();
    } 

    $conn->close();
    header("location: http://localhost/Plateforme%20de%20R%C3%A9servation%20de%20Consultations%20Juridiques/lawyer_dashboard.php");
    exit();
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
       
<!-- Lawyer Login -->
<form class="lawyer_login" method="post" >
    <h1 class="font-bold font-[#3e342e] text-2xl ml-52">Lawyer</h1>
    <div></div>
    <div>
        <label for="first name" class="label w-11/12">first name</label>
        <input type="text" name="firstname" placeholder="enter your first name" class="input w-11/12">
    </div>
    <div>
        <label for="last name" class="label w-11/12">last name</label>
        <input type="text" name="lastname" placeholder="enter your last name" class="input w-11/12">
    </div>
    <div>
        <label for="email" class="label  w-11/12">email</label>
        <input type="email" name="email" placeholder="enter your email name" class="input w-11/12">
    </div>
    <div>
        <label for="tele" class="label w-11/12">Tele</label>
        <input type="tel" name="tele" placeholder="enter your phone number" class="input w-11/12">
    </div>
    <div>
        <label for="password" class="label w-11/12">password</label>
        <input type="password" name="password" placeholder="enter your password " class="input w-11/12">
    </div>
     <div>
        <label for="signup_type" class="label w-11/12">select your signup</label>
        <select name="signup_type" value="lawyer" id="signup_type" class="input w-11/12">
            <option value="client" name="client" class="input">client</option>
            <option value="lawyer" name="lawyer" class="input">lawyer</option>
        </select>
    </div>   
    
    
    <div class="hidden" id="speciality">
        <label for="biographie" class="label w-11/12">select your speciality</label>
        <select name="speciality" id="" class="input w-11/12">
            <option value="Criminal Lawyer" class="input">Criminal Lawyer</option>
            <option value="Corporate Lawyer" class="input">Corporate Lawyer</option>
            <option value="Family Lawyer" class="input">Family Lawyer</option>
            <option value="Intellectual Property Lawyer" class="input">Intellectual Property Lawyer</option>
            <option value="Immigration Lawyer" class="input">Immigration Lawyer</option>
        </select>
    </div>
    <div class="hidden" id="biographie">
     <label for="biographie" class="label w-11/12">select your speciality</label>
     <input type="text" name="biography" placeholder="there is no limit for the characters you can write in your biographie" class=" bg-transparent input w-11/12">
    </div>
    <button id="info_submit" type="submit" name="formLawyer" class="submit_button h-10 w-11/12 ml-36">submit</button>
</form>


</div>



<script>
    document.addEventListener('DOMContentLoaded', function () {
        let signup_type = document.getElementById("signup_type");
        let speciality = document.getElementById("speciality");
        let biographie = document.getElementById("biographie");


        function toggleFields(){
            if (signup_type.value === "lawyer") {
                speciality.classList.remove("hidden");
                biographie.classList.remove("hidden");
            } else {
                speciality.classList.add("hidden");
                biographie.classList.add("hidden");
            }
        };


        toggleFields();
       signup_type.addEventListener("change", toggleFields);
    });

    
</script>

<!-- <script src="signup.js"></script> -->
</body>
</html>
