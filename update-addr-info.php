<?php
include 'header.php';
if (isset($_GET['id'])) {
    $addr_info = $addr_obj->view_addr_by_id($_GET['id']);
    if (isset($_POST['update_addr']) && $_GET['id'] === $_POST['id']) {
        $addr_obj->update_addr_info($_POST);
    }
} else {
    header('Location: index.php');
}
?>
<div class="container " > 
    <div class="row content">
        <a href="index.php"  class="button button-purple mt-12 pull-right">View Address List</a> 
        <h3>Update Address Info</h3>
        <?php
        if (isset($_SESSION['message'])) {
            echo "<p class='custom-alert'>" . $_SESSION['message'] . "</p>";
            unset($_SESSION['message']);
        }
        ?>

        <hr/>
        <form method="post" action="">
            <input type="hidden" name="id" value="<?php if (isset($addr_info['id'])) {
            echo $addr_info['id'];
        } ?>" id=""  >
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" value="<?php if (isset($addr_info['name'])) {
                   echo $addr_info['name'];
        } ?>" id="name" class="form-control" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="email_address">Email address:</label>
                <input type="email" class="form-control" value="<?php if (isset($addr_info['email_address'])) {
            echo $addr_info['email_address'];
        } ?>" name="email_address" id="email_address" required maxlength="50">
            </div>
            <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="text" class="form-control" value="<?php if (isset($addr_info['contact'])) {
            echo $addr_info['contact'];
        } ?>" name="contact" id="contact"  maxlength="50">
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select class="form-control" name="gender" id="gender">
                    <option value="">Select</option>
                    <option value="Male" <?php if (isset($addr_info['gender']) && $addr_info['gender'] == 'Male') {
            echo 'selected';
        } ?>>Male</option>
                    <option value="Female" <?php if (isset($addr_info['gender']) && $addr_info['gender'] == 'Female') {
            echo 'selected';
        } ?>>Female</option>

                </select>

            </div> 
            <div class="form-group">
                <label for="country">Country:</label>
                <input type="text" name="country" value="<?php if (isset($addr_info['country'])) {
            echo $addr_info['country'];
        } ?>" id="country" class="form-control"  maxlength="50">
            </div>
            <input type="submit" class="button button-green  pull-right" name="update_addr" value="Update"/>
        </form> 
    </div>
</div>
<hr/>
<?php
include 'footer.php';
?>

