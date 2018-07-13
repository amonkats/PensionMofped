<?php
	 $dbConnect = mysqli_connect('localhost', 'root', 'ak_94*jmv');
	 $dbSelect = mysqli_select_db($dbConnect, 'EmployeeDB');
	 

	 $id=$_POST['nin'];
	 $name=$_POST['names'];
	 $dob=$_POST['dob'];
	 $title=$_POST['title'];
	 $ipps=$_POST['ipps'];
	 $pension=$_POST['pension'];
	 $contact=$_POST['contact'];
	 $supplier=$_POST['supplier'];
	 $residence=$_POST['residence'];
	 $image=addslashes(file_get_contents($_FILES['photo']['tmp_name']));

 
	 $sql2="INSERT INTO Pensioners VALUES('$image','$name','$dob','$title','$ipps','$supplier','$pension','$id','$residence','$contact')";
	 $query2=mysqli_query($dbConnect, $sql2);
	 if(!$query2){
		 echo "<p style='color: white;'>Error in insertion of data</p>"; 
	
	 }

	 else{
		 echo "<p style='color: white;'>"; echo"<i>"; echo "Data has been inserted Successfully"; echo"</i>"; echo "</p>";
	 }
?>






