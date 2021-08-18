<?php 
include('functions.php');


if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location:login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<style>
	.header {
		background: #003366;
	}
	button[name=register_btn] {
		background: #003366;
	}
	</style>
</head>
<body>
	<div class="header">
		<h2>Admin - Home Page</h2>
	</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<div>


			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="home.php?logout='1'" style="color: red;">logout</a>
                       &nbsp; <a href="create_user.php"> + add user</a>
					</small>

				<?php endif ?>

                <?php $results = mysqli_query($db, "SELECT * FROM screens"); ?>

<table>
	<thead>
		<tr>
            <th>Screen Name</th>
			<th>Time Slot 1</th>
			<th>Movie Slot 1</th>
            <th>Time Slot 2</th>
			<th>Movie Slot 2</th>
            <th>Time Slot 3</th>
			<th>Movie Slot 3</th>
            <th>Time Slot 4</th>
			<th>Movie Slot 4</th>
            <th>Time Slot 5</th>
			<th>Movie Slot 5</th>
            <th>Time Slot 6</th>
			<th>Movie Slot 6</th>
			<th colspan="2">Action</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
        <td><?php echo $row['Screenname']; ?></td>
			<td><?php echo $row['Timeslot1']; ?></td>
			<td><?php echo $row['Movieslot1']; ?></td>
            <td><?php echo $row['Timeslot2']; ?></td>
			<td><?php echo $row['Movieslot2']; ?></td><td><?php echo $row['Timeslot3']; ?></td>
			<td><?php echo $row['Movieslot3']; ?></td><td><?php echo $row['Timeslot4']; ?></td>
			<td><?php echo $row['Movieslot4']; ?></td><td><?php echo $row['Timeslot5']; ?></td>
			<td><?php echo $row['Movieslot5']; ?></td><td><?php echo $row['Timeslot6']; ?></td>
			<td><?php echo $row['Movieslot6']; ?></td>
			<td>
				<a href="screen.php?edit=<?php echo $row['Id'];?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="func.php?del=<?php echo $row['Id'];?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>

			</div>
		</div>
	</div>
</body>
</html>