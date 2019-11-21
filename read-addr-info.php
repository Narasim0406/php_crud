<?php
 include 'header.php';
 

 if(isset($_GET['id'])){
  $addr_info=$addr_obj->view_addr_by_id($_GET['id']);
  


     
 }else{
  header('Location: index.php');
 }
 
 
 ?>
<div class="container " > 
    
  <div class="row content">

       
          
           
             <a  href="index.php"  class="button button-purple mt-12 pull-right">View Address List</a> 
     
 <h3>View Address Info</h3>
       
    
     <hr/>
   
   
 
      
    <label >Name:</label>
   <?php  if(isset($addr_info['name'])){echo $addr_info['name']; }?>

<br/>
    <label>Email address:</label>
  <?php  if(isset($addr_info['email_address'])){echo $addr_info['email_address'];} ?>
    
    <br/>
    <label >Contact:</label>
      <?php  if(isset($addr_info['contact'])){echo $addr_info['contact'];} ?>
    <br/>

  <label >Gender:</label>
   <?php  if(isset($addr_info['gender'])){echo $addr_info['gender'];} ?>
  <br/>
    <label >Country:</label>
      <?php  if(isset($addr_info['country'])){echo $addr_info['country'];} ?>
    <br/>

          

    <a href="<?php echo 'update-addr-info.php?id='.$addr_info["id"] ?>" class="button button-blue">Edit</a>

   
  
     
   
  </div>
     
</div>
<hr/>
 <?php
 include 'footer.php';
 ?>

