<?php require_once('header.php'); ?>

<div class="row">
    <div class="col-lg-6">
    <form action="profile_post.php" method="POST">
    <label class="form-label">Change Name</label>
    <input type="text" class="form-control" name="newname">
     <button class="btn btn-success" name="namechange">Change Name</button>
    </form>
    </div>
    <div class="col-lg-6">
    <form action="profile_post.php" method="POST">
    <label class="form-label">Change Email</label>
    <input type="email" class="form-control" name="newemail">
     <button class="btn btn-success" name="emailchange">Change Email</button>
    </form>
    </div>
</div>
<div class="row">
    <div class="col-lg-6">
    <form action="profile_post.php" method="POST">
    <label class="form-label">Change Password</label>
    <input type="password" class="form-control" name="newpass">
    <input type="password" class="form-control" name="newconpass">
     <button class="btn btn-success" name="passchange">Change Password</button>
    </form>
    </div>
    <div class="col-lg-6">
    <form action="profile_post.php" method="post" enctype="multipart/form-data">
    <label class="form-label">Upload Profile Picture</label>
   <div>
   <img src="..\assets\backend\image\<?php echo$_SESSION['image'];?>" alt="hehe" style="height:100px; width:100px;">
   </div>
    <input type="file" class="form-control" name="newpic">
     <button class="btn btn-success" name="pic_change">Upload Profile Photo</button>
    </form>
    </div>
</div>
<!-- Profile Image  -->




<?php require_once('footer.php');?>