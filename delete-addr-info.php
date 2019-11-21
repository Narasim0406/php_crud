<?php
 include 'header.php';
 if(isset($_GET['id'])){
  $addr_info=$addr_obj->delete_addr_info_by_id($_GET['id']);
 
     
 }else{
  header('Location: index.php');
 }
 
 ?>
