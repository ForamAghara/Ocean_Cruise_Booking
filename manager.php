
<!DOCTYPE html>
<?php  session_start();
  require_once ("settings.php");
  $conn = @mysqli_connect($host,$user,$pass,$sql_db);
   if(isset($_POST['search']))
    {
        $valueToSearch = $_POST['valueToSearch'];
        $query = "SELECT * FROM orders WHERE CONCAT(`order_id`, `order_cost`, `order_time`, `order_status`, `firstname`, `lastname`, `email`, `street`, `suburb`, `state`, `postcode`, `pnumber`, `preference`, `startdate`, `enddate`, `product`, `price`, `destination`, `guest`, `features`, `comments`) LIKE '%".$valueToSearch."%'";
          $search_result = mysqli_query($conn,$query);
        
    }
    elseif(isset($_POST['change']))
    {
        $changestatus = $_POST['changestatus'];
        $status = $_POST['status'];
        $query = "UPDATE orders SET order_status= '$status' WHERE order_id = '$changestatus'";
        $update_result = mysqli_query($conn,$query);
        $query2 = "SELECT * FROM orders WHERE order_id = '$changestatus'";
        $search_result = mysqli_query($conn,$query2);

    }
    elseif(isset($_POST['delete']))
    {
        $deleteorder = $_POST['deleteorder'];
        $prequery = "SELECT * FROM orders WHERE order_id='$deleteorder'";
        $re = mysqli_query($conn,$prequery);
        $x = mysqli_fetch_assoc($re);
        if($x['order_status'] == "PENDING"){
          $query2 = "SELECT * FROM orders";
          $search_result = mysqli_query($conn,$query2);
        }
        else {
          $query = "DELETE FROM orders WHERE order_id='$deleteorder'";        
          $delete_result = mysqli_query($conn,$query);
          $query2 = "SELECT * FROM orders";
          $search_result = mysqli_query($conn,$query2);
        }   
    }
     else {
        $query = "SELECT * FROM orders";
        $search_result = mysqli_query($conn,$query);
    }




?>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="description" content="Ocean Cruise Booking" />
  <meta name="keywords" content="HTML5, tags" />
  <meta name="Foram Aghara" content="A Lecturer"  />
  <link href="styles/style.css" rel="stylesheet">
  <script src="javascript/payment.js" ></script>
  <title>Ocean Cruise Booking</title>
  
</head>


<?php include "header.inc";?>

<body id="manager_page">


<h1>Manage Orders</h1>

 
<table id="management" frame="void" rules="rows"> 
<form action="manager.php" method="post"> 
    <tr>
    <td><h3>Search in Table : </h3><td>
    <td><input type="text" name="valueToSearch" placeholder="Enter Values to Search"><br><br></td>
    <td><input type="submit" name="search" value="Filter"><br><br></td>
    </td>
</form>

<form action="manager.php" method="post">
    <tr>
    <td><h3>Update status in Table : </h3><td> 
    <td><input type="text" name="changestatus" placeholder="Enter Order Id to Change Status"><br><br></td>
    <td><label for="status"><strong>Select Status</strong></label> 
      <select name="status" id="status" >
        <option value="Please Select">Please Select</option>      
        <option value="PENDING">PENDING </option>
        <option value="FULFILLED">FULFILLED </option>
        <option value="PAID">PAID </option>
        <option value="ARCHIVED">ARCHIVED </option>
      </select><td>
    <td><input type="submit" name="change" value="Change"><br><br></td>
    </tr>
</form>

<form action="manager.php" method="post">
    <tr>
    <td><h3>Delete order in Table : </h3><td> 
    <td><input type="text" name="deleteorder" placeholder="Enter Order Id to Delete"><br><br></td>
    <td><input type="submit" name="delete" value="Delete"><br><br></td>
    </tr>
</form>

</table>

<table >
   
   <tr>
      <th>Order Id</th>
      <th>Order Time</th>
      <th>Order Status</th>
      <th>Order Cost</th>
      <th>Full Name</th>
      <th>Email Address</th>
      <th>Phone Number</th>
      <th>Residential Address</th>
      <th>Trip Duration</th>
      <th>Product</th>
      <th>Destination</th>
      <th>Price Per Person</th>
      <th>Guests</th>
      <th>Extra Features</th>
      <th>Comments</th>
   </tr>

   <?php while($row = mysqli_fetch_array($search_result)):?>
   <tr>
      <td><?php echo $row['order_id'];?></td>
      <td><?php echo $row['order_time'];?></td>
      <td><?php echo $row['order_status'];?></td>
      <td><?php echo $row['order_cost'];?></td>
      <td><?php echo $row['firstname'], " " ,$row['lastname'];?></td>
      <td><?php echo $row['email'];?></td>
      <td><?php echo $row['pnumber'];?></td>
      <td><?php echo $row['street'], " " ,$row['suburb'], " " ,$row['state'], " " ,$row['postcode'];?></td>
      <td><?php echo $row['startdate']," - ", $row['enddate'];?></td>
      <td><?php echo $row['product'];?></td>
      <td><?php echo $row['destination'];?></td>
      <td><?php echo $row['price'];?></td>
      <td><?php echo $row['guest'];?></td>
      <td><?php echo $row['features'];?></td>
      <td><?php echo $row['comments'];?></td>
    </tr>
   <?php endwhile;?>
</table>
</body>

<?php include "footer.inc";?>
<?php mysqli_close($conn);
session_destroy()?>
</html>
