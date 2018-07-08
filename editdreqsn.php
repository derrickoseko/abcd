<?php
include 'connect.php';
$userid = $_REQUEST['userid'];
$rstid = $_REQUEST['itemid'];
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="icon" href="Images/system.png" type="image/png" sizes="16x16">
	<title>Edit Page</title>

	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style>
	
	.in{
                        background-color:#4CAF50;
                        color:white;
                        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                        padding-right: : 5px;
                        width: 100px;
                        
                        border: none;
                    }

                      .out{
                     background-color: #f44336;
                      color:white; 
                      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                      padding-right: : 5px;
                      width: 100px;


                      border: none;
                    }

                    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {height: 600px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
        
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto}; 
    }


</style>
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
                    
                        <li class="active"><a href="admin.php?userid=<?php echo $userid; ?>">Stock Magement</a></li>
                        <li class=""><a href="usersmgmt.php?userid=<?php echo $userid; ?>">Users Management</a></li>
                        <li><a href="areqstatus.php?userid=<?php echo $userid; ?>">Make a requests</a></li>
                        <li><a href="astatus.php?userid=<?php echo $userid; ?>">Requests Made</a></li>
                        <li><a href="logout.php?userid=<?php echo $userid; ?>">Logout</a></li>
        
      </ul><br>  
    </div>

<?php


$sql = "SELECT * FROM items WHERE item_code='$rstid'";
               $result = mysqli_query($conn,$sql);
               while($row=mysqli_fetch_array($result)) {
               		$itemname = $row["Item"];
               		$descr = $row["Description"];
               		$amount = $row["Quantity"];

               }
				
?>
	<form method="POST">
						<center>
					    <strong>
					      ITEM:
					    </strong>
					                

					                <input type="text" name="items" value ='<?php echo $itemname ?>' placeholder="Enter Item name">

					    <strong>
					      DESCRIPTION:  
					    </strong>

					         
                   <select  name="description" value =''>
                     <option name="selected_item" ><?php echo $descr; ?></option> Hardware
                     <option name="opt2" ><?php  if($descr=='Hardware'){ echo 'Stationary'; }else { echo $descr;}     ?></option>
                   </select>
					              
					      <strong>
					        QUANTITY:  
					      </strong>
					      
					                <input type="text" value ='<?php echo $amount ?>' name="quantity" placeholder="Enter Amount">

					                <br><br>

					                
					                	 <input class="in" name="add" type="submit" value="EDIT">
					                     <input class="out" type="reset" name="cancel" value="CANCEL">
					                
					                                             

					                <br><br>

					                </center>
	</form>

<?php


                     if (isset($_POST['add'])){

                      $items = $_POST['items']; 
                      $description = $_POST['description']; 
                      $quantity = (int)$_POST['quantity'];
                  
                      
                           $sql = "UPDATE items  
                              SET Item = '$items' , Description = '$description' , Quantity = '$quantity'
                              WHERE item_code = '$rstid'";
                              $smsql = mysqli_query($conn,$sql);
                                 

                                    if ($smsql == false) {
                                    # code...
                                      echo "ERROR->".mysqli_error();
                                      }else{
                                        
                                        echo "EDIT SUCCESS!!!";
                                      }
}
?>


</body>
</html>