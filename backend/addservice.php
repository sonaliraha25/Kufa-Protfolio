<?php  require_once('header.php')?>
<div class="row">
<div class="col-lg-6">
<form action="service_post.php" method="POST">
<label class="form-label">Service Name</label>
    <input type="text" class="form-control" name="service_name">
    <label class="form-label">Service Description</label>
    <textarea style="height:200px; width:400px; margin-top: 10px;" name="service_description"></textarea>
    <label class="form-label">Service Icon</label>
    <input type="text" class="form-control" name="service_icon">
    <label class="form-label">Service Status</label>
  <div>
  <select name="status">
    <option value="active">Active</option>
    <option value="deactive">Deactive</option>
  </select>
  </div>
     <button class="btn btn-success" name="service">ADD SERVICE</button>
</form>
</div>
</div>
