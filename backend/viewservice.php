<?php  require_once('header.php')?>
<div class="row">
<div class="col-lg-10">
<table class="table table table-striped">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Service Name</th>
            <th scope="col">Service Description</th>
            <th scope="col">Service Icon</th>
            <th scope="col">Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $show_query="SELECT *FROM services;";
         $ser_final=mysqli_query($db_connect,$show_query);
        ?>
        <?php foreach($ser_final as $service): ?>
            <tr>
            <td><?=$service['Id'];?></td>
            <td><?=$service['Service_Name'];?></td>
            <td><?=$service['Service_Description'];?></td>
            <td><?=$service['Service_Icon'];?></td>
            <td><?=$service['status'];?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
</div>
<?php require_once('footer.php')?>