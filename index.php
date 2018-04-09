<?php
session_start();
$_SESSION['userid'] ='';
include 'connect.php';
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="Images/system.png" type="image/png" sizes="16x16">
	<title>Log In Page</title>
</head>
    <style>
      h2 {
                    color: black;
                    font-family: 'Arial';
                    font-size: 30px;
              
                  }

              

                  form {
                      border: 3px solid #f1f1f1;
                  }

                  input[type=text], input[type=password] {
                      width: 100%;
                      padding: 12px 20px;
                      margin: 8px 0;
                      display: inline-block;
                      border: 1px solid #ccc;
                      box-sizing: border-box;
                  }

                  button {
                      background-color: #4CAF50;
                      color: white;
                      padding: 14px 20px;
                      margin: 8px 0;
                      border: none;
                      cursor: pointer;
                      width: 100%;
                  }

                  button:hover {
                      opacity: 0.8;
                  }

                  .cancelbtn {
                      width: auto;
                      padding: 10px 18px;
                      background-color: #f44336;
                  }

                  .imgcontainer {
                      text-align: center;
                      margin: 24px 0 12px 0;
                  }

                  img.avatar {
                      width: 4.5%;
                      border-radius: 50%;
                  }

                  .container {
                      padding: 16px;
                  }

                  span.psw {
                      float: right;
                      padding-top: 16px;
                  }

                  /* Change styles for span and cancel button on extra small screens */
                  @media screen and (max-width: 300px) {
                      span.psw {
                         display: block;
                         float: none;
                      }
                      .cancelbtn {
                         width: 100%;
                      }
                  }

                  label{
                      font-family: 'Arial';
                      font-size: 20px;
                  }

                  select{
                    font-family: 'Arial';
                  }

                  button.dt{
                    width: 200px;
                  }


      </style>
<body>
			<h2>LOG IN PAGE</h2>

      <button type="button" onclick="document.getElementById('demo').innerHTML = Date()" class="dt">
                  Click for Date and Time.
      </button>

<p id="demo"></p>


<form method="POST">
  <div class="imgcontainer">
    <img src="Images/avatar.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" id="login_uname" name="username" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" id="login_pswd" name="password" required>

       <strong>
        <label>Login as</label>  
       </strong>
        
    <select name="selectaccount" id="selectaccount">
      <option value="1">User</option>
      <option value="2">Admin</option>    
      <option value="3">Supervisor</option>
    </select>

  <br>

    <label>
      <input type="checkbox" checked="checked"> Remember me
    </label>
   
  </div>

  <div class="container" style="background-color:#f1f1f1">
    

      <button type="submit" id="login_proceed" name="login" value="Proceed" align="right">
                        CONFIRM  
      </button>
    
    <a href="">
      <button type="button" class="cancelbtn">Cancel</button>  
    </a>
    
  </div>
</form>



<?php
if(isset($_POST['login'])){ 
   $accsel = $_POST['selectaccount'];
   switch($accsel){
     case 0:
     break;
     case 1:  //user   
     
     $lusname = $_POST['username']; 
  $lpass = $_POST['password']; 
  $user_un ='';
  $message ='';
  $query1 = "SELECT * FROM users where username ='$lusname' and password ='$lpass' and user_type_id ='3'";
  $smsql = mysqli_query($conn,$query1);
    while($rsmo=mysqli_fetch_array($smsql)){
     $_SESSION['userid'] = $rsmo['user_id'];
     $_SESSION['username'] = $rsmo['username'];
     $user_un= $_SESSION['username'];
     $user_ss = $_SESSION['userid'];
     echo 'user logged in->'.$user_ss.' un-'.$user_un;
    header("Location: users.php?userid=".$user_ss);
    }
    if(!strlen(trim($user_un)) > 0){
     echo 'Wrong username and/or Password';
     
    }
     break;
     case 2:  //admin  
     
     $lusname = $_POST['username']; 
      $lpass = $_POST['password']; 
      $user_un ='';
      $message ='';
      $query1 = "SELECT * FROM users where username ='$lusname' and password ='$lpass' and user_type_id ='1'";
  $smsql = mysqli_query($conn,$query1);
    while($rsmo=mysqli_fetch_array($smsql)){
     $_SESSION['userid'] = $rsmo['user_id'];
     $_SESSION['username'] = $rsmo['username'];
     $user_un= $_SESSION['username'];
     $user_ss = $_SESSION['userid'];
     echo 'user logged in->'.$user_ss.' un-'.$user_un;
     header("Location: admin.php?userid=".$user_ss);
    }

    if(!strlen(trim($user_un)) > 0){
     echo 'Wrong username and/or Password';
     
    }
     
     break;    
     default:
     break;    
   } 
   exit();
 
}
?>
  
</body>

</html>