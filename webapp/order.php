<?php
session_start();
$FName= $_POST["FName"];
$Lname= $_POST["Lname"];
$Address= $_POST["Address"];
$Mobile= $_POST["Mobile"];
$servername="localhost";
$username="root";
$password="book2544";
$dbname="shop";
$con=mysqli_connect($servername,$username,$password,$dbname);
if(!$con) die("Connnect mysql database fail!!".mysqli_connect_error());

$sql="INSERT INTO orderproduct (FName,Lname,Address,Mobile)";

$sql.="VALUES('$FName','$Lname','$Address','$Mobile')";
$last_id;
if (mysqli_query($con, $sql)) {
    $last_id = mysqli_insert_id($con);

    $sql1="INSERT INTO orderdetail (Order_ID,Product_ID) VALUES ";
    for($i=0;$i<count($_SESSION["cart"]);$i++){
        $item_id=$_SESSION["cart"][$i]['ID'];
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
  $_SESSION["send_id"] = $last_id;
  mysqli_close($conn);

?>
<script>
    window.alert("เเสดงสินค้า");
    window.location.replace("showlistproduct.php")
</script>