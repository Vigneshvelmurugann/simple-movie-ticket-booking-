<?php 

    session_start();
	$db = mysqli_connect('localhost', 'root', '', 'multi_login');

	// initialize variables
    $screenname="";
	$timeslot1="";
	$movieslot1="";
    $timeslot2="";
	$movieslot2="";
    
	$timeslot3="";
	$movieslot3="";
    
	$timeslot4="";
	$movieslot4="";
    
	$timeslot5="";
	$movieslot5="";
    
	$timeslot6="";
	$movieslot6="";
    
	
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
        
		$screenname=$_POST['screenname'];
        $timeslot1 = $_POST['timeslot1'];
		$movieslot1 = $_POST['movieslot1'];
        
		$timeslot2 = $_POST['timeslot2'];
		$movieslot2 = $_POST['movieslot2'];

		$timeslot3 = $_POST['timeslot3'];
		$movieslot3 = $_POST['movieslot3'];

		$timeslot4 = $_POST['timeslot4'];
		$movieslot4 = $_POST['movieslot4'];

		$timeslot5 = $_POST['timeslot5'];
		$movieslot5 = $_POST['movieslot5'];

		$timeslot6 = $_POST['timeslot6'];
		$movieslot6 = $_POST['movieslot6'];

		mysqli_query($db, "INSERT INTO screens (Screenname,Timeslot1,Movieslot1,Timeslot2,Movieslot2,Timeslot3,Movieslot3,Timeslot4,Movieslot4,
        Timeslot5,Movieslot5,Timeslot6,Movieslot6) VALUES ('$screenname','$timeslot1', '$movieslot1','$timeslot2',
         '$movieslot2','$timeslot3', '$movieslot3','$timeslot4', '$movieslot4','$timeslot5', '$movieslot5','$timeslot6', '$movieslot6')"); 
		$_SESSION['message'] = "Screen Added"; 
		header('location: screen.php');
	}
    if (isset($_POST['update'])) {
        $id= $_POST['id'];
        $screenname=$_POST['screenname'];
        $timeslot1 = $_POST['timeslot1'];
		$movieslot1 = $_POST['movieslot1'];
        
		$timeslot2 = $_POST['timeslot2'];
		$movieslot2 = $_POST['movieslot2'];

		$timeslot3 = $_POST['timeslot3'];
		$movieslot3 = $_POST['movieslot3'];

		$timeslot4 = $_POST['timeslot4'];
		$movieslot4 = $_POST['movieslot4'];

		$timeslot5 = $_POST['timeslot5'];
		$movieslot5 = $_POST['movieslot5'];

		$timeslot6 = $_POST['timeslot6'];
		$movieslot6 = $_POST['movieslot6'];

        
        mysqli_query($db, "UPDATE screens SET Screenname='$screenname', Timeslot1='$timeslot1', Movieslot1='$movieslot1',
         Timeslot1='$timeslot1', Movieslot2='$movieslot2', Timeslot3='$timeslot3', Movieslot3='$movieslot3', Timeslot4='$timeslot4', Movieslot4='$movieslot4'
         , Timeslot5='$timeslot5', Movieslot5='$movieslot5', Timeslot6='$timeslot6', Movieslot6='$movieslot6' WHERE Id=$id");
        $_SESSION['message'] = "Screen Updated!"; 
        header('location: screen.php');
    }
    if (isset($_GET['del']))
    {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM screens WHERE Id=$id");
        $_SESSION['message'] = "Screen Removed!"; 
        header('location: screen.php');
    }