<?php
session_start();
$ID=$_GET["ID"];
$servername="localhost";
$username="root";
$password="book2544";
$dbname="shop";
$con=mysqli_connect($servername,$username,$password,$dbname);
if(!$con) die("Connnect mysql database fail!!".mysqli_connect_error());
$sql="SELECT ID,Name,Price,Description FROM product WHERE ID=$ID";
$result=mysqli_query($con,$sql);
$numrow=mysqli_num_rows($result);
if(mysqli_num_rows($result)>0)
{
    $success=1;
    $row=mysqli_fetch_assoc($result);
    echo $row['ID']."<br>";
    echo $row['Name']."<br>";
    echo $row['Description']."<br>";
    echo $row['Price']."<br>";

    if(!isset($_SESSION["cart"]))
        $_SESSION["cart"]=array();
    $items=array("ID"=>$row['ID'],
                "Name"=>$row['Name'],
                "Description"=>$row['Description'],
                "Price"=>$row['Price']);
    array_push($_SESSION["cart"],$items);
    print_r($_SESSION["cart"]);
}
else
{
    $success=0;
}
mysqli_close($con);
?>
<?php
if($success!=0){
?>
<script>
    window.alert("นำสินค้าใส่ตะกร้าเรียบร้อยแล้ว")
    window.location.replace("showproduct.php");
</script>
<?php
}
else
{
?>
<script>
    window.alert("เกิดข้อผิดพลาด !!!")
    window.location.replace("showproduct.php");
</script>
<?php
}
?>