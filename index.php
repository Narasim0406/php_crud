<?php
include 'header.php';
$addr_list = $addr_obj->addr_list();
?>
<div class="container " > 
    <div class="row content">
        <a  href="create-addr-info.php"  class="button button-purple mt-12 pull-right">Create Address</a> 
        <h3>Address List</h3>
        <?php
        if (isset($_SESSION['message'])) {
            echo "<p class='custom-alert'>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']);
        }
        ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Gender</th>
                    <th class="text-right">Action</th>
                </tr>
            </thead>
            <tbody>
<?php
if ($addr_list->num_rows > 0) {
  while ($row = $addr_list->fetch_assoc()) {
     ?>
             <tr>
                <td><?php echo $row["name"] ?></td>
                <td><?php echo $row["email_address"] ?></td>
                <td><?php echo $row["contact"] ?></td>
                <td><?php echo $row["gender"] ?></td>
                <td class="text-right">
                    <a  href="<?php echo 'delete-addr-info.php?id=' . $row["id"] ?>" class="button button-red">Delete</a>  
                    <a  href="<?php echo 'update-addr-info.php?id=' . $row["id"] ?>" class="button button-blue">Edit</a>  
                    <a href="<?php echo 'read-addr-info.php?id=' . $row["id"] ?>" class="button button-green">View</a>
                </td>
            </tr>
    <?php
    }
}
?>
           </tbody>
        </table>

    </div>
</div>
<?php
include 'footer.php';
?>  

