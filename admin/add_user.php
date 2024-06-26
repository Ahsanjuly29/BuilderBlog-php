<?php require_once('include/head.php');?>
<?php require_once('include/session.php');?>
<?php require_once('include/header.php');?>
<?php require_once('include/asidebar.php');?>

<section class="testimonial py-5" id="testimonial">
    <div class="container">
        <div class="row ">
            <div class="col-md-4 py-5 bg-primary text-white text-center ">
                <div class=" ">
                    <div class="card-body">
                      <img src="../img/users/user-default-image.png" style="width:40%" id="previmg" >
                        <h2 class="py-3">Preview Image</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-8 py-5 border">
                <h4 class="pb-4">Please fill with User Details</h4>
				
                <form class="" action="add_user_post.php" method="POST" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label class="control-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" type="text" placeholder="type your Name" autofocus />
                              <?php
                                if(isset($_SESSION['name_msg'])) {
                                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['name_msg']."</p>";
                                   unset($_SESSION['name_msg']);
                                }
                              ?>   
                        </div>
                    </div>                  
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label class="control-label">username</label>
                            <input type="text" class="form-control" name="username" id="username" type="text" placeholder="type your Username" value="" autofocus />
                              <?php
                                if(isset($_SESSION['username_msg'])) {
                                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['username_msg']."</p>";
                                   unset($_SESSION['username_msg']);
                                }
                              ?>   
                        </div>
                        <div class="form-group col-md-6">
                            <label class="control-label">Email</label>
                            <input class="form-control" type=" " placeholder="type your Email address" name="email" id="inputEmail4"autofocus>
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
                            <input id="Mobile No." name="mobile" placeholder="Mobile No." class="form-control" type="text">
                            <?php
                                if(isset($_SESSION['mobile_msg'])) {
                                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['mobile_msg']."</p>";
                                   unset($_SESSION['mobile_msg']);
                                }
                              ?> 
						            </div>
                        <div class="form-group col-md-6">
                             <label class="control-label">Profile Image</label>
                             <input id="image" name="image" class="form-control" type="file" onchange="document.getElementById('previmg').src = window.URL.createObjectURL(this.files[0])">
                            <?php
                                if(isset($_SESSION['img_msg'])) {
                                   echo "<p class='pt-1 text-danger text-center'>".$_SESSION['img_msg']."</p>";
                                   unset($_SESSION['img_msg']);
                                }
                              ?> 
                        </div>

                        <div class="form-group col-md-8">
                            <label class="control-label">About you</label>
                            <textarea id="editor" name="about" cols="40" rows="5" placeholder="about you" class="form-control"></textarea>
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
                            <option value="2"> Admin</option>
                            <option value="1"> User</option>
                          </select>
                        </div>                         
                    </div>

                    <div class="form-row">
                        <button class="btn btn-danger btn-block" name="add_user_data">
                        <i class="fa fa-sign-in fa-lg fa-fw"> Add User</i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php require_once('include/footer.php');?>