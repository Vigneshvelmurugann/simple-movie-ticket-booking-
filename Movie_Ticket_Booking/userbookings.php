<html>
<body>
<?php $db=mysqli_connect("localhost","root","","multi_login"); ?>
<?php if (isset($_POST['bookings'])) { 
$id=$_POST["id2"];
$results = mysqli_query($db, "SELECT * FROM bookingdetails Where id=$id"); 
}
?>


<table>
	<thead>
		<tr>
             <th>User Id</th>
			<th>Movie Name</th>
			<th>Ticket Price</th>
			<th >Screen</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['Id']; ?></td>
			<td><?php echo $row['Moviename']; ?></td>
			<td><?php echo $row['Timing']; ?></td>
			<td><?php echo $row['Screenname']; ?></td>
		</tr>
	<?php } ?>
</table>
</body>
</html>

