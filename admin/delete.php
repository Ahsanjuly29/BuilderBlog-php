<?php require_once('include/head.php');?>

<?php // Delete Users 
	if (isset($_POST['delete_user'])) {
		$variable = $_POST['deleteitem'];
		if (!empty($variable)) {
			foreach ($variable as $value) {
				$select = "SELECT * FROM users WHERE user_id = '$value'";
				$select_query = mysqli_query($db,$select);
				if ($select_query) {
					$check = mysqli_fetch_assoc($select_query);
					if ($check['image'] != 'user-default-image.png'){
						$img_loc = '../img/users/'.$check['image'];
						if (file_exists($img_loc)){
							unlink($img_loc);
						}
						else{} // End chking file exist or not
						$delete_query = "DELETE FROM users WHERE user_id='$value'";
						if (mysqli_query($db,$delete_query)) {
							$_SESSION['deleted'] = "data Has been Deleted";
							header("location:user_data.php");
						}// end of database Query file 
					}//End of checking Default file or not
					else{				
						$delete_query = "DELETE FROM users WHERE user_id='$value'";
						if (mysqli_query($db,$delete_query)) {
							$_SESSION['deleted'] = "data Has been Deleted";
							header("location:user_data.php");
						}// end of database Query file 
					}//Default image Else ended 
				}//Select Query Ended
			}//End Of ForEach
		}// Empty Argument Passed or not
		else{
			header("location:user_data.php");
		}// End of Empty Argument Passed or not
	}//End of Isset Data_User
?>

<?php // Delete Service 
	if (isset($_POST['delete_service'])) {
		$variable = $_POST['deleteitem'];
		if (!empty($variable)) {
			foreach ($variable as $value) {
				$select = "SELECT * FROM service WHERE ser_id = '$value'";
				$select_query = mysqli_query($db,$select);
				if ($select_query) {
					$check = mysqli_fetch_assoc($select_query);
					if ($check['image'] != 'user-default-image.png'){
						$img_loc = '../img/services/'.$check['image'];
						if (file_exists($img_loc)){
							unlink($img_loc);
						}
						else{} // End chking file exist or not
						$delete_query = "DELETE FROM service WHERE ser_id='$value'";
						if (mysqli_query($db,$delete_query)) {
							$_SESSION['deleted'] = "data Has been Deleted";
							header("location:service_list.php");
						}// end of database Query file 
					}//End of checking Default file or not
					else{				
						$delete_query = "DELETE FROM service WHERE ser_id='$value'";
						if (mysqli_query($db,$delete_query)) {
							$_SESSION['deleted'] = "data Has been Deleted";
							header("location:service_list.php");
						}// end of database Query file 
					}//Default image Else ended 
				}//Select Query Ended
			}//End Of ForEach
		}// Empty Argument Passed or not
		else{
			header("location:service_list.php");
		}// End of Empty Argument Passed or not
	}//End of Isset Data_User
?>

<?php // Delete Projects 
	if (isset($_POST['delete_project'])) {
		$variable = $_POST['deleteitem'];
		if (!empty($variable)) {
			foreach ($variable as $value) {
				$select = "SELECT * FROM projects WHERE pro_id = '$value'";
				$select_query = mysqli_query($db,$select);
				if ($select_query) {
					$check = mysqli_fetch_assoc($select_query);
					if ($check['image'] != 'user-default-image.png'){
						$img_loc = '../img/services/'.$check['image'];
						if (file_exists($img_loc)){
							unlink($img_loc);
						}
						else{} // End chking file exist or not
						$delete_query = "DELETE FROM projects WHERE pro_id='$value'";
						if (mysqli_query($db,$delete_query)) {
							$_SESSION['deleted'] = "data Has been Deleted";
							header("location:project_list.php");
						}// end of database Query file 
					}//End of checking Default file or not
					else{				
						$delete_query = "DELETE FROM projects WHERE pro_id='$value'";
						if (mysqli_query($db,$delete_query)) {
							$_SESSION['deleted'] = "data Has been Deleted";
							header("location:project_list.php");
						}// end of database Query file 
					}//Default image Else ended 
				}//Select Query Ended
			}//End Of ForEach
		}// Empty Argument Passed or not
		else{
			header("location:project_list.php");
		}// End of Empty Argument Passed or not
	}//End of Isset Data_User
?>


<!-- //DELETE icon -->
<?php // Delete  mail
	if (isset($_POST['delete_icon'])) {

		$variable = $_POST['deleteitem'];
		if (!empty($variable)) {
			foreach ($variable as $value) {
				$delete_query = "DELETE FROM social WHERE social_id='$value'";
			// die();	
				if (mysqli_query($db,$delete_query)) {
					$_SESSION['deleted'] = "data Has been Deleted";
					header("location:social_list.php");
				}// end of database Query file 
			}//End Of ForEach
		}// Empty Argument Passed or not
		else{
			header("location:social_list.php");
		}// End of Empty Argument Passed or not
	}//End of Isset Data_User
?>


<!-- //DELETE mail -->
<?php // Delete  mail
	if (isset($_POST['delete_mail'])) {

		$variable = $_POST['deleteitem'];
		if (!empty($variable)) {
			foreach ($variable as $value) {
				$delete_query = "DELETE FROM mail WHERE mail_id='$value'";
			// die();	
				if (mysqli_query($db,$delete_query)) {
					$_SESSION['deleted'] = "data Has been Deleted";
					header("location:mail.php");
				}// end of database Query file 
			}//End Of ForEach
		}// Empty Argument Passed or not
		else{
			header("location:mail.php");
		}// End of Empty Argument Passed or not
	}//End of Isset Data_User
?>


<?php require_once('include/footer.php');?>
