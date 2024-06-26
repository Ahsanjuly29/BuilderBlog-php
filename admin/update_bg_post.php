<?php require_once('include/head.php');?>
<?php
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['add_bg'])) {
		
			$title = $_POST['title'];
			// Start Of User Validation
			if (!empty($title)){
				$titlevalue = $_POST['title'];
			}//Condition empty Title ended 
			else{
				$_SESSION['title_msg'] = "title can't be empty";
				header("location:dashboard.php");
				die();
			}
			//title ended

			// details started
			$bg_desc = htmlspecialchars($_POST['bg_desc'], ENT_QUOTES);

			// Start Of User Validation
			if (!empty($bg_desc)){
				//values for database
				$detailsvalue = $bg_desc;
			}//Condition empty Title ended 
			else{
				$_SESSION['title_msg'] = "Details can't be empty";
				header("location:dashboard.php");
				die();
			}

			if (empty($_FILES['image']['name'])) {
				// Update Query
				$update_query = "UPDATE bg SET bg_title='$titlevalue', bg_desc='$detailsvalue' WHERE bg_id='1'";
				if (mysqli_query($db,$update_query)){
					$_SESSION['Success_msg'] = "Background Updated Successfully";
					header("location:dashboard.php");
				}
				else{
					$_SESSION['Success_msg'] = "failed to add this service";
					header("location:dashboard.php");
				}
			}// empty image condition

			// if image not empty
			else{
				//start of checking old file
				$select_query = mysqli_query($db, "SELECT * FROM bg");
				foreach ($select_query as $check) {
					if ($check['bg'] != 'default-image.jpg'){
						$img_loc = '../img/'.$check['bg'];
						if (file_exists($img_loc)) {
							unlink($img_loc);
						}
					}//end of deleting old file 					 
				}//start of checking old file
				$img_explode = explode('.', $_FILES['image']['name']);
				$ext = end($img_explode);
				$format = array('jpg','png','gif','JPG','PNG','GIF');
				$id = $check['bg_id'];

				if (in_array( $ext, $format)) {
					if ($_FILES['image']['size'] < 1099999){
						
						$filename = $id.'.'.$ext;
						move_uploaded_file($_FILES['image']['tmp_name'], '../img/'.$filename);
						$update_query = "UPDATE bg SET bg='$filename', bg_title='$titlevalue', bg_desc='$detailsvalue' WHERE bg_id='$id'";
						if (mysqli_query($db,$update_query)){
							$_SESSION['Success_msg'] = "Background Updated";
							header('location:dashboard.php');
						}
						else{
							$_SESSION['Success_msg'] = "failed to add this service 2";
							header("location:dashboard.php");
						}
					}//end of Size condition
					else{
						$_SESSION['title_msg'] = "Image can't more then 1 MB";
						header("location:dashboard.php");
						die();
					}
				}//end of Format condition
				else{
					$_SESSION['title_msg'] = "File Format Must be jpg , png or bmp";
					header("location:dashboard.php");
					die();
				}
			}//end of else condition
		}
	}
?>
<?php require_once('include/footer.php');?>