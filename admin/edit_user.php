<?php require_once('include/head.php');?>
<?php require_once('include/session.php');?>

<?php// session_start();?>
<?php require_once('include/header.php');?>
<?php require_once('include/asidebar.php');?>
 

<?php
    if (isset($_GET['id'])) {

        $id = $_GET['id'];

        $fetch_data = "SELECT * FROM users WHERE user_id = $id";
        $execute_query = mysqli_query($db,$fetch_data);
        $assoc = mysqli_fetch_assoc($execute_query);
?>

<section class="testimonial py-5" id="testimonial">
    <div class="container">
        <div class="row ">
            <div class="col-md-4 py-5 bg-primary text-white text-center ">
                <div class=" ">
                    <div class="card-body">

                        <img src="../img/users/<?= $assoc['image']; ?>" alt=""width="100px" height="100px" id="previmg" >
                        <h2 class="py-3"><?php echo $assoc['username'];?></h2>
                        <p><?php echo $assoc['about']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-8 py-5 border">
                <h4 class="pb-4">Please fill with your details</h4>
				
                <form class="" action="update_user_data.php?id=<?= $id?>" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                             <label class="control-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" type="text" placeholder="type your Name" value="<?php echo $assoc['name']; ?>" autofocus />
                              <?php
                                if(isset($_SESSION['name_msg'])) {
                                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['name_msg']."</p>";
                                   unset($_SESSION['name_msg']);
                                }
                              ?>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Email</label>
                            <input class="form-control" type=" " placeholder="type your Email address" name="email" id="inputEmail4" value="<?php echo $assoc['email']; ?>" autofocus />
                            <?php
                                if(isset($_SESSION['email_msg'])) {
                                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['email_msg']."</p>";
                                   unset($_SESSION['email_msg']);
                                
                                }
                              ?>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="control-label">mobile</label>
                            <input id="Mobile No." name="mobile" placeholder="Mobile No." value="<?php echo $assoc['mobile']; ?>" class="form-control" type="text">
                            <?php
                                if(isset($_SESSION['mobile_msg'])) {
                                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['mobile_msg']."</p>";
                                   unset($_SESSION['mobile_msg']);
                                  
                                }
                              ?> 
					             	</div>
                        <div class="form-group col-md-6">
                             <label class="control-label">Profile image</label>
                            <input id="image" name="image" class="form-control" onchange="document.getElementById('previmg').src = window.URL.createObjectURL(this.files[0])" type="file">
                        </div>
                        <div class="form-group col-md-8">
                            <label class="control-label">About you</label>
                              <textarea id="editor" name="about" cols="40" rows="5" placeholder="about you" class="form-control"><?php echo $assoc['about']; ?></textarea>
                            <?php
                                if(isset($_SESSION['about_msg'])) {
                                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['about_msg']."</p>";
                                   unset($_SESSION['about_msg']);
                                
                                }
                              ?> 
						            </div>
                        <div class="form-group col-md-4">
                          <label class="control-label">Select Role For this User</label>
                          <select name="role" id="inputState" class="form-control">
                            <option value="0">Choose ...</option>
                            <option value="1"<?php if($assoc['role']==1){echo "Selected";}?>> User</option>
                            <option value="2"<?php if($assoc['role']==2){echo "Selected";}?>> Admin</option>
                          </select>
                        </div>                         
                    </div>

                    <div class="form-row">
                        <button type="submit" class="btn btn-danger btn-block" name="update_user_data">
                          Update <i class="fa fa-sign-in fa-lg fa-fw"></i>
                        </button>
                    </div>

                </form>


            </div>
        </div>
    </div>
</section>

<?php   } require_once('include/footer.php');?>