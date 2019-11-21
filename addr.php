<?php
class Addressbook
{
    private $conn;
    function __construct() {
    session_start();
    $servername = "narasimdb.cyqr5tllyg7e.ap-southeast-2.rds.amazonaws.com";
    $dbname = "narasimdb";
    $username = "narasimdb";
    $password = "runmachine";
  

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
      if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
       }else{
        $this->conn=$conn;  
       }

    }


// list of book like api
    public function addr_list(){
        
       $sql = "SELECT * FROM addressbook ORDER BY id asc ";
       $result=  $this->conn->query($sql);
       return $result;  
    }
    

// create method
    public function create_addr_info($post_data=array()){
         
       if(isset($post_data['create_addr'])){
       $name= mysqli_real_escape_string($this->conn,trim($post_data['name']));
       $email_address= mysqli_real_escape_string($this->conn,trim($post_data['email_address']));
       $gender= mysqli_real_escape_string($this->conn,trim($post_data['gender']));
       $contact= mysqli_real_escape_string($this->conn,trim($post_data['contact']));
       $country= mysqli_real_escape_string($this->conn,trim($post_data['country']));

       $sql="INSERT INTO addressbook (name, email_address, contact,country,gender) VALUES ('$name', '$email_address', '$contact','$country','$gender')";
        
        $result=  $this->conn->query($sql);
        
           if($result){
           
               $_SESSION['message']="Successfully Created Address Info";
               
              header('Location: index.php');
           }
          
       unset($post_data['create_addr']);
       }
       
        
    }
    


// search method and fetching expected data

    public function view_addr_by_id($id){
       if(isset($id)){
       $id= mysqli_real_escape_string($this->conn,trim($id));
      
       $sql="Select * from addressbook where id='$id'";
        
       $result=  $this->conn->query($sql);
     
        return $result->fetch_assoc(); 
    
       }  
    }
    
    

// updating row
    public function update_addr_info($post_data=array()){
       if(isset($post_data['update_addr'])&& isset($post_data['id'])){
           
       $name= mysqli_real_escape_string($this->conn,trim($post_data['name']));
       $email_address= mysqli_real_escape_string($this->conn,trim($post_data['email_address']));
       $gender= mysqli_real_escape_string($this->conn,trim($post_data['gender']));
       $contact= mysqli_real_escape_string($this->conn,trim($post_data['contact']));
       $country= mysqli_real_escape_string($this->conn,trim($post_data['country']));
       $id= mysqli_real_escape_string($this->conn,trim($post_data['id']));

       $sql="UPDATE addressbook SET name='$name',email_address='$email_address',contact='$contact',country='$country',gender='$gender' WHERE id =$id";
     
        $result=  $this->conn->query($sql);
        
           if($result){
               $_SESSION['message']="Successfully Updated Address Info";
           }
       unset($post_data['update_addr']);
       }   
    }
    


// delete method
    public function delete_addr_info_by_id($id){
        
       if(isset($id)){
       $id= mysqli_real_escape_string($this->conn,trim($id));

       $sql="DELETE FROM  addressbook  WHERE id =$id";
        $result=  $this->conn->query($sql);
        
           if($result){
               $_SESSION['message']="Successfully Deleted";
            
           }
       }
         header('Location: index.php'); 
    }


// connection close method
    function __destruct() {
    mysqli_close($this->conn);  
    }
    
}

?>
