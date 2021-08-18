<?php  include('func.php'); ?>
<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM screens WHERE Id=$id");

		if (@count(array($record))== 1) {
			$n = mysqli_fetch_array($record);
            $screenname=$n['Screenname'];
			$timeslot1=$n['Timeslot1'];
			$movieslot1=$n['Movieslot1'];
            $timeslot2 = $n['Timeslot2'];
			$movieslot2 = $n['Movieslot2'];
            $timeslot3 = $n['Timeslot3'];
			$movieslot3 = $n['Movieslot3'];
            $timeslot4 = $n['Timeslot4'];
			$movieslot4 = $n['Movieslot4'];
            $timeslot5 = $n['Timeslot5'];
			$movieslot5 = $n['Movieslot5'];
            $timeslot6 = $n['Timeslot6'];
			$movieslot6 = $n['Movieslot6'];
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
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
<br><br>
<br>

   	    <form method="post" action="func.php" >
		    <div class="input-group">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
    </div>
            <div class="input-group">
            <label>Screen Name</label>
            <input type="text" name="screenname" value="<?php echo $screenname; ?>"></div>
			    <label>Time Slot 1</label>
				<input type="text" name="timeslot1" value="<?php echo $timeslot1; ?>">
		    </div>
		    <div class="input-group">
			    <label>Movie Slot 1</label>
			    <input type="text" name="movieslot1" value="<?php echo $movieslot1; ?>">
		    </div>
            <div class="input-group">
			    <label>Time Slot 2</label>
				<input type="text" name="timeslot2" value="<?php echo $timeslot2; ?>">
		    </div>
		    <div class="input-group">
			    <label>Movie Slot 2</label>
			    <input type="text" name="movieslot2" value="<?php echo $movieslot2; ?>">
		    </div>
            <div class="input-group">
			    <label>Time Slot 3</label>

				<input type="text" name="timeslot3" value="<?php echo $timeslot3; ?>">
		    </div>
		    <div class="input-group">
			    <label>Movie Slot 3</label>
			    <input type="text" name="movieslot3" value="<?php echo $movieslot3; ?>">
		    </div>
            <div class="input-group">
			    <label>Time Slot 4</label>
				<input type="text" name="timeslot4" value="<?php echo $timeslot4; ?>">
		    </div>
		    <div class="input-group">
			    <label>Movie Slot 4</label>
			    <input type="text" name="movieslot4" value="<?php echo $movieslot4; ?>">
		    </div>
            <div class="input-group">
			    <label>Time Slot 5</label>
				<input type="text" name="timeslot5" value="<?php echo $timeslot5; ?>">
		    </div>
		    <div class="input-group">
			    <label>Movie Slot 5</label>
			    <input type="text" name="movieslot5" value="<?php echo $movieslot5; ?>">
		    </div>
            <div class="input-group">
			    <label>Time Slot 6</label>
			    
				<input type="text" name="timeslot6" value="<?php echo $timeslot6; ?>">
		    </div>
		    <div class="input-group">
			    <label>Movie Slot 6</label>
			    <input type="text" name="movieslot6" value="<?php echo $movieslot6; ?>">
		    </div>
            
		    <div class="input-group">
			<?php if ($update == true): ?>
	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
<?php else: ?>
	<button class="btn" type="submit" name="save" >Add</button>
<?php endif ?>

		    </div>
	    </form>
</body>
</html>