<?php
include 'connect.php';
$userid = $_REQUEST['userid'];
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="Images/system.png" type="image/png" sizes="16x16">
  <title>Make a request</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 600px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;} 
    }

    
    .in{
          background-color:#4CAF50;
          color:white;
          font-family:'Arial';
          padding-right: : 5px;
          width: 100px;
          height: 50px;
          border: none;
}

  .out{
 background-color: #f44336;
  color:white; 
  font-family:'Arial';
  padding-right: : 5px;
  width: 100px;
  height: 50px;
  border: none;
}

input:hover {
          opacity: 0.8;
    }

.form-style{
        position: absolute;
        resize: none;
        overflow: auto;
        border-style: solid;
        border-width: thin; 
        width: 70%;
        margin-left: 350px;
        background-color: lightgrey;
        
    }

.space{
  width: 500px;
}


  </style>
</head>
<body>
    <h2>Welcome Admin</h2>

<hr>
    <div class="container-fluid">
      <div class="row content">
          <div class="col-sm-3 sidenav">

     <u>
       <h4>ADMINS DASHBOARD</h4>
     </u> 
          <ul class="nav nav-pills nav-stacked">

        <li><a href="admin.php?userid=<?php echo $userid; ?>">Stock</a></li>
        <li class=""><a href="usersmgmt.php?userid=<?php echo $userid; ?>">Users Management</a></li>
        <li class="active"><a href="arequest.php?userid=<?php echo $userid; ?>">Make a request</a></li>
        <li><a href="astatus.php?userid=<?php echo $userid; ?>">Requests Made</a></li>
        <li><a href="logout.php">Logout</a></li>

        
      </ul><br>
      
    </div>






<div class="position">
  <form class="form-style" method="POST">
    <center>
      <b>
        <u>
          <h3>REQUEST FORM</h3> 
        </u>          
      </b>        
    
    
                                        <b>
                                          Date requested:<br>    
                                        </b>
                                      
                                      <input class="space" type="Date" name="rdate" value="Select date requested">
                                      <br><br>

                                      <b>
                                        Item:<br>  
                                      </b>
                                      
                                                          
                                                                    <select class="space" name="items">
                                                                        <?php
                                                                        echo "<option syle='font-weight:bold;' value=''>".'--SELECT ITEM--'."</option>";
                                                                         $sql = "SELECT * FROM items";
                                                                         $result = mysqli_query($conn,$sql);                 
                                                                         while($rsmod=mysqli_fetch_array($result)){
                                                                          $item_code= $rsmod['item_code'];
                                                                          $item= $rsmod['Item'];
                                                                          $description= $rsmod['Description'];
                                                                          $new=$description.' -'.$item;

                                                                          echo "<option value='$item'>".$new."</option>";              
                                                                         }
                                                                        ?>
                                                                    </select> 
                                                       
                                      <br><br>

                                      <b>
                                        Quantity:<br>  
                                      </b>
                                      
                                      <input class="space" type="text" name="quantity" placeholder="Enter number of item(s)">
                                      <br><br>

                                      <b>
                                        Department requesting:<br>  
                                      </b>
                                      
                                                     
                                                                    <select class="space" name="dpt">
                                                                        <option >Production</option>
                                                                        <option >Research and Development</option>
                                                                        <option >Purchasing</option>
                                                                        <option >Marketing</option>
                                                                        <option >Human Resource Management</option>
                                                                        <option >Accounting and Finance.</option> 
                                                                        <option>Admin</option>
                                                                    </select>                            
                                                          
                                      <br><br>
                                      <input class="in" name="submit" type="submit" value="REQUEST">
                                      <input class="out" type="reset" name="cancel" value="CANCEL">

                                      </center>
                                      <br><br>




    

<br>

<?php

if (isset($_POST['submit'])) {  
 
  
  $date = $_POST['rdate']; 
  $items = $_POST['items']; 
  $quantity = $_POST['quantity']; 
  $department = $_POST['dpt'];
 
          if ($items=='') {
            echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
              echo "alert('PLEASE SELECT ITEM');";
              echo "</script>";
            # code...
          }else{


       $sql = "INSERT INTO requisition (req_id, rdate, item, quantity, dep_requesting, approved) 
             values (DEFAULT,'$date','$items','$quantity','$department',0)";
              $smsql = mysqli_query($conn,$sql);
  if ($smsql == false) {
    echo "ERROR".mysqli_error();
  }else{
    echo "Operation Success!!!";
  }
  

 
  }

}
?>
</form>
</div>

</body>
</html>