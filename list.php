<?php 
   session_start(); 
   
   if (!isset($_SESSION['email'])) {
   	$_SESSION['msg'] = "You must log in first";
   	header('location: index.php');
   }
   
   if (isset($_GET['logout'])) {
   	session_destroy();
   	unset($_SESSION['email']);
   	header("location: index.php");
   }
   
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Index</title>
      <link rel="stylesheet" href="style.css">
      <style>
         html {
         height: 100%;
         }
         body {
         width: 100%;
         height: 100%;
         display: grid;
         justify-items: center;
         align-items: center;
         background-color: white;
         border-radius: 7px;
         box-shadow: 0px 0px 5px 2px black;
         }
         /* The Modal (background) */
         .modal {
         display: none; /* Hidden by default */
         position: fixed; /* Stay in place */
         z-index: 1; /* Sit on top */
         width: 100%; /* Full width */
         height: 100%; /* Full height */
         overflow: auto; /* Enable scroll if needed */
         background-color: rgb(0,0,0); /* Fallback color */
         background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
         }
         /* Modal Content */
         .modal-content {
         position: fixed;
         top: 50%;
         left: 50%;
         transform: translate(-50%, -50%);
         margin-left:auto;
         margin-right:auto;
         background-color: white;
         width: 50%;
         }
         /* The Close Button */
         .close {
         color: white;
         float: right;
         font-size: 28px;
         font-weight: bold;
         }
         .close:hover,
         .close:focus {
         color: #000;
         text-decoration: none;
         cursor: pointer;
         }
         .modal-header {
         padding: 2px 16px;
         background-color: grey;
         color: white;
         }
         .modal-body {padding: 20px 16px;}
         .modal-footer {
         padding: 2px 16px;
         background-color: grey;
         color: white;
         }
      </style>
   </head>
   <body>
      <header>
         <h1>List view details <button id="myBtn">Add Details</button></h1>
         <a href="list.php?logout='1'"> Logout</a>
      </header>
      <!-- The Modal -->
      <div id="myModal" class="modal">
         <!-- Modal content -->
         <div class="modal-content">
            <div class="modal-header">
               <span class="close">&times;</span>
               <h2>Add detail</h2>
            </div>
            <div class="modal-body">
               <form action="insert.php" method="post">
                  <label for="name"> Name: </label><input type="text" id="name" name="name" placeholder="Enter your name" required><br><br>
                  <label for="dob">Date of Birth: </label><input type="date" id="birthday" name="dob" required /><br><br>
                  <label for="gender">Gender: </label>
                  <input type="radio" id="male" name="gender" value="Male" onclick="ShowHideDiv()" required><label for="male">Male</label>
                  <input type="radio" id="female" name="gender" value="Female" onclick="ShowHideDiv()" required /><label for="female" >Female</label>
                  <br>
                  <br>
                  <div id="dvtext" style="display: none">
                     Enter your Height:
                     <input type="text" id="height" name="height">
                  </div>
                  <div id="dvtext1" style="display: none">
                     Enter your Weight:
                     <input type="text" id="weight"  name="weight">
                  </div>
                  <div class="alert-msg" style="text-align: center;"></div>
                  <br>
                  <input type="submit"/> <input type="reset"/>
               </form>
            </div>
         </div>
      </div>
      <div class="container">
         <div class="col-lg-12">
            <?php
               $servername = "localhost";
               $username = "root";
               $password = "";
               $dbname = "project";
               
               // Create connection
               $conn = new mysqli($servername, $username, $password, $dbname,"3308");
               // Check connection
               if ($conn->connect_error) {
               	die("Connection failed: " . $conn->connect_error);
               }
               
               $sql = "SELECT id, name, dob, gender, height, weight FROM details ORDER BY id DESC LIMIT 50";
               $result = $conn->query($sql);
               
               
               if ($result->num_rows > 0) {
               	echo "<table>";
               	// output data of each row
               	while($row = $result->fetch_assoc()) {
               		echo "<tr><th>Name:".$row["name"]." - "," ","<a href='delete.php?del=$row[id]'>Delete</a>","</th></tr>";
               		echo "<tr><td>Date of Birth:".$row["dob"]."</td></tr>";
               		echo "<tr><td>Gender:".$row["gender"]."<br>Height:".$row["height"]." Weight:".$row["weight"]."</td></tr>";
               	}
               	echo "</table>";
               } else {
               	echo "There is no details yet";
               }
               
               $conn->close();
               ?>
         </div>
      </div>
      <script>
         function ShowHideDiv() {
                 var chkmale = document.getElementById("male");
                 var dvtext = document.getElementById("dvtext");
                 dvtext.style.display = chkmale.checked ? "block" : "none";
         
                 var chkfemale = document.getElementById("female");
                 var dvtext1 = document.getElementById("dvtext1");
                 dvtext1.style.display = chkfemale.checked ? "block" : "none";
             }
         
         // Get the modal
         var modal = document.getElementById("myModal");
         
         // Get the button that opens the modal
         var btn = document.getElementById("myBtn");
         
         // Get the <span> element that closes the modal
         var span = document.getElementsByClassName("close")[0];
         
         // When the user clicks the button, open the modal
         btn.onclick = function() {
           modal.style.display = "block";
         }
         
         // When the user clicks on <span> (x), close the modal
         span.onclick = function() {
           modal.style.display = "none";
         }
         
         // When the user clicks anywhere outside of the modal, close it
         window.onclick = function(event) {
           if (event.target == modal) {
             modal.style.display = "none";
           }
         }
         
      </script>
   </body>
</html>