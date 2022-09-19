<?php
session_start();
echo $_POST["fname"];
echo $_POST["lname"];
echo $_POST["address"];
echo $_POST["mobile"];
$servername="localhost";
$username="root";
$password="book2544";
$dbname="shop";
$con=mysqli_connect($servername,$username,$password,$dbname);
if(!$con) die("Connnect mysql database fail!!".mysqli_connect_error());

$sql="INSERT INTO orderproduct (Nname,Lname,Address,Moblie)";

$sql="VALUES('$Name','Lname','$Address','$Moblie')";

if (mysqli_query($con, $sql)) {
    $last_id = mysqli_insert_id($con);
    
    $sql1="INSERT INTO orderdetails (Order_ID,Product_ID) VALUES ";
    for($i=0;$i<count($_SESSION["cart"]);$i++){
        $item_id=$_SESSION["cart"][$i]['id'];
        $sql1.="('$last_id','$item_id')";
        if($i<count($_SESSION["cart"])-1)
         $sql1.=",";
        else
         $sql.=";";
    }
    
    if(mysqli_query($con,$sql1)) echo "บันทึกข้อมูลการสั่งซื้อเรียบร้อยแล้ว";
    else "เกิดข้อผิดพลาดในการสั่งซื้อ";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  mysqli_close($conn);

?>