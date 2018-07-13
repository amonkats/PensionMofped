<?php
 $dbConnect = mysqli_connect('localhost', 'root', 'ak_94*jmv');
 $dbSelect = mysqli_select_db($dbConnect, 'Employeedb');
 if(!$dbConnect){
	 echo "No Connections";
 }else{
	 
	 echo "<h2 style='color: white;'>"; echo "You Are Currently Connected to the Database"; echo "&nbsp;";
	 echo "&nbsp;"; echo "&nbsp;"; echo"<a href='login.php'>";  echo"Logout";  echo"</a>"; echo"</h2>";
	     echo "<h3 style='color: #fff;'>Please Enter Pensioner's Info</h3></p>";
 }
?>