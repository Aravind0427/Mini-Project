<?php

// php code to Delete data from mysql database 


				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "project";
    
    
    // connect to mysql
    $connect = mysqli_connect($servername, $username, $password, $dbname,"3308");
    
    // mysql delete query 
    $sql = "DELETE FROM details WHERE id ='$_GET[del]'";
    
    $result = mysqli_query($connect, $sql);
    
    if($result)
    {
      echo("<script>alert('Post Deleted Successfully')</script>");
	  echo("<script>window.location = 'list.php';</script>");
    }else{
      echo("<script>alert('Unable to Delete the Post Kindly contact Admin to resolve the issue')</script>");
	  echo("<script>window.location = 'list.php';</script>");
    }
    


?>