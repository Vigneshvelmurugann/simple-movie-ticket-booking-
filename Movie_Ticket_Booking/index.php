
	<?php $db = mysqli_connect('localhost', 'root', '', 'multi_login');?>
<?php 
	include('functions.php');

if (!isLoggedIn()) {
	$_SESSION['msg'] = "You must log in first";
	header('location: login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		<h2>Home Page</h2>
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
		<div class="profile_info">
			<img src="images/user_profile.png"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="index.php?logout='1'" style="color: red;">logout</a>
					</small>

				
                
<br>
<h1>Screen Name and Timings</h1>
<?php $res = mysqli_query($db, "SELECT * FROM screens"); ?>
<form action="book.php" method="post">
<input type="hidden" name="id" value="<?php echo ucfirst($_SESSION['user']['id']);?>"/>
<?php while ($row=mysqli_fetch_array($res)){?>
<label><?php echo $row['Screenname']; ?></label>
<input type="radio" name="s" value="<?php echo $row['Screenname']; ?>"/>
<br>
<label><?php echo $row['Movieslot1']; ?></label>
	<input type="radio" name="m" value="<?php echo $row['Movieslot1']; ?>" />
	<label><?php echo $row['Timeslot1']; ?></label>
	<input type="radio" name="t" value="<?php echo $row['Timeslot1']; ?>"/>
	<br>
	<label><?php echo $row['Movieslot2']; ?></label>
	<br>

<input type="radio" name="m" value="<?php echo $row['Movieslot2']; ?>" />
<label><?php echo $row['Timeslot2']; ?></label>
<input type="radio" name="t" value="<?php echo $row['Timeslot2']; ?>"/>
<br>
	<label><?php echo $row['Movieslot3']; ?></label>
	<br>

	<input type="radio" name="m" value="<?php echo $row['Movieslot3']; ?>" />
	<label><?php echo $row['Timeslot3']; ?></label>
	<input type="radio" name="t" value="<?php echo $row['Timeslot3']; ?>"/>
	<br>
	<label><?php echo $row['Movieslot4']; ?></label>
	<br>


<input type="radio" name="m" value="<?php echo $row['Movieslot4']; ?>" />
<label><?php echo $row['Timeslot4']; ?></label>
<input type="radio" name="t" value="<?php echo $row['Timeslot4']; ?>"/>
<br>
	<label><?php echo $row['Movieslot5']; ?></label>
	<br>

	<input type="radio" name="m" value="<?php echo $row['Movieslot5']; ?>" />
	<label><?php echo $row['Timeslot5']; ?></label>
		<input type="radio" name="t" value="<?php echo $row['Timeslot5']; ?>"/>
<br>
	<label><?php echo $row['Movieslot6']; ?></label>
	<br>

<input type="radio" name="m" value="<?php echo $row['Movieslot6']; ?>" />
<label><?php echo $row['Timeslot6']; ?></label>
<input type="radio" name="t" value="<?php echo $row['Timeslot6']; ?>"/>
<button class="btn" type="submit" name="submit" >Add</button>
<hr>
<?php } ?>
</form>
<?php endif ?>
<br>
<br>
<form method=post action=userbookings.php>
<div>
<input type="hidden" name="id2" value="<?php echo ucfirst($_SESSION['user']['id']);?>"/>
<a href=userbookings.php ><button class="btn" type="submit" name="bookings" >Bookings</button></a>
</div>
</form>
			</div>
		</div>
	</div>
</body>
</html>