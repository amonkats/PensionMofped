<?php include "pensiondb.php"?>

<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>MofPed Pension Database</title>
</head>

<?php 
	 $photo="";
	 $name="";
	 $dob="";
	 $title="";
	 $ipps="";
	 $supplier="";
	 $pension="";
	 $id="";
	 $residence="";
	 $contact="";  

	 //Errors
	 $photoErr="";
	 $nameErr="";
	 $dobErr="";
	 $titleErr="";
	 $ippsErr="";
	 $supplierErr="";
	 $pensionErr="";
	 $idErr="";
	 $residenceErr="";
	 $contactErr="";
	 
	 mysqli_Report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
	 
 function getPosts(){
	$posts=array();
	$posts[1]=$_POST['names'];
	$posts[2]=$_POST['dob'];
	$posts[3]=$_POST['title'];
	$posts[4]=$_POST['ipps'];
	$posts[5]=$_POST['supplier'];
	$posts[6]=$_POST['pension'];
	$posts[7]=$_POST['nin'];
	$posts[8]=$_POST['residence'];
	$posts[9]=$_POST['contact'];
	return $posts;
}

if (htmlspecialchars($_SERVER["REQUEST_METHOD"] == "POST")) {
		if(isset($_POST['btn_Add']) && empty($_POST['photo']['tmp_name'])){
			$photoErr = "Photo required";
    		
 	} else{
  		 $photo = test_input($_FILES['photo']['tmp_name']);
 	 }
 		 if (isset($_POST['btn_Add']) && empty($_POST["names"])) {
    		$nameErr = "Name required";
 	} else{
  		 $name = test_input($_POST["names"]);
 	 }
 	 	 if (isset($_POST['btn_Add']) && empty($_POST["dob"])) {
    		$dobErr = "Date of Birth required";
 	} else{
  		 $dob = test_input($_POST["dob"]);
 	 }
  		if (isset($_POST['btn_Add']) && empty($_POST["title"])) {
    		$titleErr = "Title Required";
 	 } else {
    	$title = test_input($_POST["title"]);
	  }
	  if (isset($_POST['btn_Add']) && empty($_POST["ipps"])) {
    		$ippsErr = "IPPS No Required";
 	 } else {
    	$ipps = test_input($_POST["ipps"]);
	  }
	  if (isset($_POST['btn_Add']) && empty($_POST["supplier"])) {
    		$supplierErr = "Supplier No Required";
 	 } else {
    	$supplier = test_input($_POST["supplier"]);
	  }
	  if (isset($_POST['btn_Add']) && empty($_POST["pension"])) {
    		$pensionErr = "Pension File No Required";
 	 } else {
    	$pension = test_input($_POST["pension"]);
	  }
	  if (isset($_POST['btn_Add']) && empty($_POST["nin"])) {
    		$idErr = "National IDNo Required";
 	 } else {
    	$id = test_input($_POST["nin"]);
	  }
	  if (isset($_POST['btn_Add']) && empty($_POST["residence"])) {
    		$residenceErr = "Area of Residence Required";
 	 } else {
    	$residence = test_input($_POST["residence"]);
	  }
	  if (isset($_POST['btn_Add']) && empty($_POST["contact"])) {
    		$contactErr = "Contact Details Required";
 	 } else {
    	$contact = test_input($_POST["contact"]);
	  }
	  if (isset($_POST['btn_Add']) && ($_POST["names"]) !='' && ($_POST["dob"])!='' && ($_POST["title"])!='' &&
	  			($_POST["ipps"])!='' && ($_POST["supplier"])!='' && ($_POST["pension"])!='' && ($_POST["nin"])!='' && 
	  			($_POST["residence"])!='' && ($_POST["contact"])!='') {
    		include "insert.php";
    		$photoErr = "";
 	 } else {
    	
	  }
	
}


if(isset($_POST['btnsearch'])){
	 $dbConnect = mysqli_connect('localhost', 'root', 'ak_94*jmv');
	 $dbSelect = mysqli_select_db($dbConnect, 'EmployeeDB');
	 $data=getPosts();
	 $search_Query="SELECT * FROM Pensioners WHERE IPPS_No = $data[4]";
	 $search_result=mysqli_query($dbConnect, $search_Query);
	 
	 if($search_result){
		 if(mysqli_num_rows($search_result)){
			 while($row=mysqli_fetch_array($search_result)){
		
				 $name=$row['Name_of_Pensioner'];
				 $dob=$row['Date_of_Birth'];
				 $title=$row['Title'];
				 $ipps=$row['IPPS_No'];
				 $supplier=$row['Supplier_No'];
				 $pension=$row['Pension_File_No'];
				 $id=$row['NIN'];
				 $residence=$row['Area_of_Residence'];
				 $contact=$row['Contact_details'];
			 }
		 }else{echo "<p style='color: white;'>"; echo"<i>"; echo "No data for this ID"; echo"</i>"; echo "</p>";}
	 }else{echo mysqli_error();}
}
	if(isset($_POST['btndelete'])){
		$data=getPosts();
		$sql_delete="DELETE FROM PENSIONERS WHERE IPPS_No = $data[4]";
		
		try{
			$delete_result=mysqli_query($dbConnect, $sql_delete);
			if($delete_result){
				if(mysqli_affected_rows($dbConnect) > 0){
					echo "<p style='color: white;'>"; echo"<i>"; echo "Data has been deleted"; echo"</i>"; echo "</p>";
				}else{echo "<p style='color: white;'>"; echo"<i>"; echo "Data not deleted"; echo"</i>"; echo "</p>"; }
			}
			
		}catch(Exception $ex){
			echo "Error in Delete".$ex->getMessage();
		}
	}
	
	if(isset($_POST['btnupdate'])){
		$data=getPosts();
		$sql_update="UPDATE PENSIONERS SET Name_of_Pensioner='$data[1]', Date_of_Birth='$data[2]', Title='$data[3]',
		             Supplier_No='$data[5]', Pension_File_No='$data[6]', NIN='$data[7]',
					 Area_of_Residence='$data[8]', Contact_details='$data[9]' WHERE IPPS_No='$data[4]'";
		
		try{
			$update_result=mysqli_query($dbConnect, $sql_update);
			if($update_result){
				if(mysqli_affected_rows($dbConnect) > 0){
					echo "<p style='color: white;'>"; echo"<i>"; echo "Data has been Updated"; echo"</i>"; echo "</p>";
				}else{echo "<p style='color: white;'>"; echo"<i>"; echo "Data not Updated"; echo"</i>"; echo "</p>";}
			}
			
		}catch(Exception $ex){
			echo "Error in Update".$ex->getMessage();
		}
	}
	if(isset($_POST['btnreset'])){
		 $photo="";
		 $name="";
		 $dob="";
		 $title="";
		 $ipps="";
		 $supplier="";
		 $pension="";
		 $id="";
		 $residence="";
		 $contact="";
	}
	
function test_input($keepData) {
  $keepData = trim($keepData);
  $keepData = stripslashes($keepData);
  $keepData = htmlspecialchars($keepData);
  $keepData = basename($keepData);
  return $keepData;
}


?>

<body style="text-align: center; background-color: #74AFAD;" >

<a href='store.php' style="color: #fff;">Go To Table</a>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data" method="post" style="background-color: #7D1935; border: 2px solid #7E8F7C; border-radius: 20px;">
<table align="center" border=1 cellpadding=2 style="border-collapse: collapse; border: 2px solid white;">
		
		<div style="color: white;">       
		<!--Photo Upload-->
		<tr><td style="color: #fff;">Photo</td><td style="color: #fff;"><input type="file" id='photo' name="photo" value="<?php echo $photo ?>" /><span style="color: #FF0000;">* <?php echo $photoErr;?></span></td></tr>

		<!--Name of Pensioner-->
		<tr><td style="color: #fff;">Name of Pensioner / Beneficiary</td><td><input type="text" id='name' name="names" value="<?php echo $name ?>" /><span style="color: #FF0000;">* <?php echo $nameErr;?></span></td></tr>

		<!--Date of Birth-->
		<tr><td style="color: #fff;">Date of Birth</td><td><input type="text" id='dob' name="dob" value="<?php echo $dob ?>" /><span style="color: #FF0000;">* <?php echo $dobErr;?></span></td></tr>

		<!--Title-->
		<tr><td style="color: #fff;">Title</td><td><input type="text" id='title' name="title" value="<?php echo $title ?>" /><span style="color: #FF0000;">* <?php echo $titleErr;?></span></td></tr>

		<!--IPPS No-->
		<tr><td style="color: #fff;">IPPS No.</td><td><input type="number" id='ipps' name="ipps" value="<?php echo $ipps ?>" /><span style="color: #FF0000;">* <?php echo $ippsErr;?></span></td></tr>

		<!--Supplier No-->
		<tr><td style="color: #fff;">Supplier No.</td><td><input type="text" id='supplier' name="supplier" value="<?php echo $supplier ?>"  /><span style="color: #FF0000;">* <?php echo $supplierErr;?></span></td></tr>

		<!--Pension File No-->
		<tr><td style="color: #fff;">Pension File No.</td><td><input type="text" id='pension' name="pension" value="<?php echo $pension ?>"  /><span style="color: #FF0000;">* <?php echo $pensionErr;?></span></td></tr>

		<!--National IDNo-->
		<tr><td style="color: #fff;">National IDNo.(NIN)</td><td><input type="text" id='nin' name="nin" value="<?php echo $id ?>" /><span style="color: #FF0000;">* <?php echo $idErr;?></span></td></tr>

		<!--Area of Residence-->
		<tr><td style="color: #fff;">Area of Residence.</td><td><input type="text" id='area' name="residence" value="<?php echo $residence ?>" /><span style="color: #FF0000;">* <?php echo $residenceErr;?></span></td></tr>

		<!--Contact Details-->
		<tr><td style="color: #fff;">Contact Details</td><td><input type="text" id='details' name="contact" value="<?php echo $contact ?>"  /><span style="color: #FF0000;">* <?php echo $contactErr;?></span></td></tr>
		</div>
</table><br />
<div>
	<input type="submit" style="width:120px; height:30" name="btnupdate" value="Update" />
    <input type="submit" style="width:120px; height:30" name="btndelete" value="Delete" />	
	<input type="submit" style="width:120px; height:30" name="btn_Add" value="Insert" />
	<input type="submit" style="width:120px; height:30" name="btnsearch" value="Search" />
	<input type="submit" style="width:120px; height:30" name="btnreset" value="Refresh" onclick='window.location.reload(true);' />
	</div>
	
</div>

<?php
	

?>

</form>

<footer style="background: black; height: 100px; border-radius: 15px;">
	<div style="color: #fff; padding: 20px;">
		All Rights © Designed 2017 by AmonKats The Computer Programmer (CP).<br>
			Contacts:   +256774572835 / +256701215120<br>
			Email:   amonkats94@gmail.com / amonkats94@outlook.com
	</div>

</footer>

</body>
</html>
