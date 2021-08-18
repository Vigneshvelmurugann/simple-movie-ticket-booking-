<?php 

    session_start();
	$db = mysqli_connect('localhost', 'root', '', 'multi_login');

	// initialize variables
	$name = "";
	$address = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['mvename'];
		$address = $_POST['ticketprice'];

		mysqli_query($db, "INSERT INTO mveinfo (Moviename,Ticketprice) VALUES ('$name', '$address')"); 
		$_SESSION['message'] = "Movie Added"; 
		header('location: home.php');
	}
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['mvename'];
        $address = $_POST['ticketprice'];
    
        mysqli_query($db, "UPDATE mveinfo SET Moviename='$name', Ticketprice='$address' WHERE Id=$id");
        $_SESSION['message'] = "Movie Updated!"; 
        header('location: home.php');
    }
    if (isset($_GET['del']))
    {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM mveinfo WHERE id=$id");
        $_SESSION['message'] = "Movie deleted!"; 
        header('location: home.php');
    }