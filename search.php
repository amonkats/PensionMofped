<table border=1 style="border: 1px solid black; border-collapse: collapse; border: 2px solid black;">
<tr style="background: #558C89; color: #fff; height: 50px;">		
		
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
		$nm=$_GET['nm'];
		$dbConnect = mysqli_connect('localhost', 'root', 'ak_94*jmv');
	    $dbSelect = mysqli_select_db($dbConnect, 'EmployeeDB');
		$res=mysqli_query($dbConnect, "SELECT * FROM Pensioners WHERE Name_of_Pensioner LIKE('$nm%')");

			while($row1=mysqli_fetch_array($res)):;?>
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
		<?php mysqli_close($dbConnect); ?>
	</table>
				
				
