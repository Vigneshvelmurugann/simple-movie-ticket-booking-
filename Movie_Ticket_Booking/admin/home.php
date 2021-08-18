<?php  include('server.php'); ?>
<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM mveinfo WHERE Id=$id");

		if (@count(array($record))== 1) {
			$n = mysqli_fetch_array($record);
			$name = $n['Moviename'];
			$address = $n['Ticketprice'];
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
<style>
body {
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: #eceffc;
}

.btn {
  padding: 8px 20px;
  border-radius: 0;
  overflow: hidden;

  &::before {
    position: absolute;
    content: "";
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(
      120deg,
      transparent,
      var(--primary-color),
      transparent
    );
    transform: translateX(-100%);
    transition: 0.6s;
  }

  &:hover {
    background: transparent;
    box-shadow: 0 0 20px 10px hsla(204, 70%, 53%, 0.5);

    &::before {
      transform: translateX(100%);
    }
  }
}

.form-input-material {
  --input-default-border-color: white;
  --input-border-bottom-color: white;
  
  input {
    color: white;
  }
}

.login-form {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 50px 40px;
  color: white;
  background: rgba(0, 0, 0, 0.8);
  border-radius: 10px;
  box-shadow: 0 0.4px 0.4px rgba(128, 128, 128, 0.109),
    0 1px 1px rgba(128, 128, 128, 0.155),
    0 2.1px 2.1px rgba(128, 128, 128, 0.195),
    0 4.4px 4.4px rgba(128, 128, 128, 0.241),
    0 12px 12px rgba(128, 128, 128, 0.35);

  h1 {
    margin: 0 0 24px 0;
  }

  .form-input-material {
    margin: 12px 0;
  }

  .btn {
    width: 100%;
    margin: 18px 0 9px 0;
  }
}

</style>
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
<?php $results = mysqli_query($db, "SELECT * FROM mveinfo"); ?>

<table>
	<thead>
		<tr>
			<th>Movie Name</th>
			<th>Ticket Price</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['Moviename']; ?></td>
			<td><?php echo $row['Ticketprice']; ?></td>
			<td>
				<a href="home.php?edit=<?php echo $row['Id'];?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="server.php?del=<?php echo $row['Id'];?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
<br>
<br>

   	    <form class="login-form" method="post" action="server.php" >
		   <div class="form-input-material">

		   <input type="hidden" name="id" value="<?php echo $id; ?>">
		   <label for="username">Movie Name</label>

    <input type="text" name="mvename" id="username" value="<?php echo $id; ?>" placeholder="" autocomplete="off" class="form-control-material" required />
    
  </div>
  <div class="form-input-material">
  <label for="password">Ticket Price</label>
    <input type="number" name="ticketprice" id="password"value="<?php echo $address; ?>" placeholder="" autocomplete="off" class="form-control-material" required />
    
  </div>

		    <div class="form-input-material">
			<?php if ($update == true): ?>
	<button class="btn btn-primary btn-ghost" type="submit" name="update" style="background: #556B2F;" >update</button>
<?php else: ?>
	<button class="btn btn-primary btn-ghost" type="submit" name="save" >Add</button>
<?php endif ?>

		    </div>
	    </form>
</body>
</html>