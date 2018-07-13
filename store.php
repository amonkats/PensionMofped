
 <!doctype html>
 <html><head>
	<meta charset="utf-8" />
	<title>MofPed Pension Database</title>
 
 </head>
 <body style="text-align: center;">
	<img src="images/arms.jpg" />
	<p>THE REPUBLIC OF UGANDA</p>
	<table border="1" style="border: 1px solid black; border-collapse: ; border: 2px solid black; text-align: center;" align="center">
	<div style="background-color:"><h2>MINISTRY OF FINANCE, PLANNING AND ECONOMIC DEVELOPMENT</h2><p>
	<h3>VERIFIED PENSION DATABASE</h3></p></div>
	
	<form action="" method="get">
		<input type="text" placeholder="search for Name.." name="valueToSearch" id="searchedValue" onKeyUp="searchValue();"/>		
	</form>
	<div id='d1'></div>
	<script type="text/javascript">
		function searchValue(){
			xmlhttp = new XMLHttpRequest();
			xmlhttp.open("GET","search.php?nm="+document.getElementById("searchedValue").value,false);
			xmlhttp.send(null);
			document.getElementById('d1').innerHTML=xmlhttp.responseText;
		}
	</script>
		
	
		<tr style="background: #4CAF50; color: #fff; height: 50px; font-size: 20px;">		
		
			<th>Photo</th>
			<th>Name of Pensioner / Beneficiary</th>
			<th>Date of Birth</th>
			<th>Title</th>
			<th>IPPS No.</th>
			<th>Supplier No.</th>
			<th>Pension File No.</th>
			<th>National IDNo.(NIN)</th>
			<th>Area of Residence</th>
			<th>Contact Details</th>

		</tr>
		<?php
		  $dbConnect = mysqli_connect('localhost', 'root', 'ak_94*jmv');
	      $dbSelect = mysqli_select_db($dbConnect, 'EmployeeDB');

		  $sql="SELECT * FROM Pensioners ORDER BY Name_of_Pensioner";
		  		
	      $query=mysqli_query($dbConnect, $sql);
			while($row1=mysqli_fetch_array($query)):;?>
					
		<tr>
			<td><img src="data:image/jpeg;base64,<?php echo base64_encode($row1[0]);?>" height="130" width="150" /></td>
			<td><?php echo $row1[1];?></td>
			<td><?php echo $row1[2];?></td>
			<td><?php echo $row1[3];?></td>
			<td><?php echo $row1[4];?></td>
			<td><?php echo $row1[5];?></td>
			<td><?php echo $row1[6];?></td>
			<td><?php echo $row1[7];?></td>
			<td><?php echo $row1[8];?></td>
			<td><?php echo $row1[9];?></td>
		</tr>
		
		<?php endwhile;?>
		<?php mysqli_close($dbConnect);?>
	</table>
	
	</body>
	</html>
 
 

 
 