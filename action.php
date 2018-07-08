
<?php
if(isset($_POST['login'])){ 
 $lusname = $_POST['username']; 
  $lpass = $_POST['password']; 
  $user_un ='';
  $message ='';
  $query1 = "SELECT * FROM users where username ='$lusname' and password ='$lpass' and user_type ='1'";
  $smsql = mysqli_query($conn,$query1);
    while($rsmo=mysqli_fetch_array($smsql)){
     $_SESSION['user_id'] = $rsmo['user_id'];
     $_SESSION['username'] = $rsmo['username'];
     $user_un= $_SESSION['username'];
     $user_ss = $_SESSION['user_id'];
     echo 'user logged in->'.$user_ss.' un-'.$user_un;
    }
    if(!strlen(trim($user_un)) > 0){
     echo 'Wrong username and/or Password';
     
    }
}
?>