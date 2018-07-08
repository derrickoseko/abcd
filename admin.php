<?php
include 'connect.php';
 $userid = $_REQUEST['userid'];
?>
<!DOCTYPE html>
<html>
<head>
<link rel="icon" href="Images/system.png" type="image/png" sizes="16x16">
	<title>Stock Management</title>
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
      .row.content {height: auto}; 
    }

    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    

      }
    th, td {
        padding: 10px;
        padding-right: 150px;
        text-align: left;


}
    tr:nth-child(even){
          background-color: lightgrey
        }

        

                  a.edit{
                    background-color: #4CAF50;
                    color: white;
                    padding: 5px 20px;
                    margin: 8px 0;
                    border: none;
                    font-family: "Trebuchet MS", Arial;
                    cursor: pointer;
                  }

                  a.edit:hover{
                          opacity: 0.8;
                  }

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
                    
                        <li class="active"><a href="admin.php?userid=<?php echo $userid; ?>">Stock Magement</a></li>
                        <li class=""><a href="usersmgmt.php?userid=<?php echo $userid; ?>">Users Management</a></li>
                        <li><a href="areqstatus.php?userid=<?php echo $userid; ?>">Make a request</a></li>
                        <li><a href="astatus.php?userid=<?php echo $userid; ?>"> Requests Made</a></li>
                        <li><a href="logout.php">Logout</a></li>
        
      </ul><br>  
    </div>
    <div>

      <form method="POST">

    <strong>
      ITEM:
    </strong>
                

                <input type="text" name="items" placeholder="Enter Item name">

    <strong>
      DESCRIPTION:  
    </strong>
    
                <select name="description">
                  <option value="Stationary">Stationary</option>
                  <option value="Hardware">Hardware</option>
                </select>

      <strong>
        QUANTITY:  
      </strong>
      
                <input type="text" name="quantity" placeholder="Enter Amount">

                <br><br>
                                              <input class="in" name="add" type="submit" value="ADD">
                                              <input class="out" type="reset" name="cancel" value="CANCEL">

                <br><br>

     <?php

              if (isset($_POST['add'])) {  
               
                $items = $_POST['items']; 
                $description = $_POST['description']; 
                $quantity = (int)$_POST['quantity'];
               
               echo 'SUCCESS '.$description;
              // exit();
                if ($items=='') {
                  echo "<script language=\"JavaScript\" type=\"text/JavaScript\">";
                    echo "alert('PLEASE KEY IN AN ITEM');";
                    echo "</script>";
                  # code...
                }else{

                $sql = "INSERT INTO items (Item, Description, Quantity ,item_code) 
                          values 
                        ('$items','$description','$quantity',DEFAULT)";

                $smsql = mysqli_query($conn,$sql);
                

                if ($smsql == false) {
                  # code...
                  echo "ERROR->".mysqli_error();
                }else{
                  echo " ADDED!!!";
                }
                

               
                }

              }else if (isset($_POST['edit'])) { 
                $var1 = $_POST['edit1'];
                echo 'SELECTED ITEM'.$var1;
                
              }
?>  


    </div>



<div class="itemstable" id="" style="overflow:scroll; height:500px;">
  <?php
  
           echo 'LOGGED IN USER '.$userid;
                $sql = "SELECT * FROM items";
               $result = mysqli_query($conn,$sql); 

                if (mysqli_num_rows($result) > 0) {
                    echo "<table>

                                  <tr>

                                      <th>ITEM</th>
                                      <th>DESCRIPTION(TYPE)</th>
                                      <th>QUANTITY</th>
                                      <th>EDIT</th>

                                    </tr>";
                    // output data of each row
                    while($row=mysqli_fetch_array($result)) {
                        echo "<tr> <input  name='edit1' type='hidden' value='".$row["item_code"]. "' />
                                  <td>" . $row["Item"]. "</td> 
                                  <td>". $row["Description"]. "</td> 
                                  <td>" . $row["Quantity"]. "</td>
                                  <td> 
                                  <a class='edit' href='editdreqsn.php?userid=$userid&itemid=".$row["item_code"]."'> EDIT</a>
                                  
                                  </td>
                                  </tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 RESULTS";
                }

               

?>



     </form>



      

</div>



</body>
</html>



















