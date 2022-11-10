<!DOCTYPE html>
<html>
<head>
    <title>PHP connect Mysql</title>
    <style>
        body{
            display:flex;
            position: relative;
            flex-direction:column;
            background:rgb(255, 127, 209);
            justify-content:center;
            align-items:center;
        }
        td,tr,th{
            border: 3px double red;
            border-radius:10px;
            position:relative;
            max-width:auto;
        }
        table {
            border: 8px double red;
            border-radius:10px;
            max-width: auto; 
        }
        div{
            margin: 2rem;

        }
        td,tr{
            margin: 7px 10px;
            padding: 0.7rem 0.5rem;
            
            
        }
        th{
            background:rgb(3, 99, 211);
            color:#fff;
            padding: 0.7rem 0.5rem;
            font:small-caps 800 22px Arial,sans-serif;
        }
        td{
            background:rgb(3, 158, 255);
            color:#fff;
            padding: 0.7rem 0.5rem;
            font: 600 16px serif;
        }
        a{
            background:rgb(170,150,170);
            border: 1px solid #ddd;
            padding:0.1rem 0.2rem;
            margin: 0.1rem;
            font:small-caps 200 16px Arial,sans-serif;
            color:#fff;
        }
        h1{
            margin:2.8% 4.5%;
            color:#fff;
            font: 800 20px serif;
            color:black;
        }
        h2{
            font-size: 50px;
        }
    </style>
</head>
<?php
session_start();
$servername="localhost";
$username="root";
$password="book2544";
$dbname="shop";
$per_page=10;

$con=mysqli_connect($servername,$username,$password,$dbname);
if(!$con) die("Connnect mysql database fail!!".mysqli_connect_error());

$send_id = $_SESSION['send_id'];
$sql = "SELECT * FROM `orderproduct`,`orderdetail`,`product` WHERE `orderproduct`.ID = `orderdetail`.Order_ID AND `orderdetail`.Product_ID =  `product`.ID AND `orderdetail`.Order_ID=$send_id";
$result=mysqli_query($con,$sql);

if(mysqli_num_rows($result)>0){
    echo "<table border=2px double><tr><th>order_id</th><th>name</th><th>fname</th><th>lname</th><th>address</th><th>mobile</th><th>price</th></tr>";
    while($row=mysqli_fetch_assoc($result)){
    echo "<tr><td>".$row["Order_ID"]."</td><td>".$row["Name"]."</td><td>".$row["FName"]."</td><td>";
    echo $row["Lname"]."</td><td>".$row["Address"]."</td><td>";
    echo $row["Mobile"]."</td><td>".$row["Price"]."</td></tr>";
    }
    $total=0;
    for($i=0;$i<count($_SESSION["cart"]);$i++){
        $item=$_SESSION["cart"][$i];
        $total+=$item['Price'];
    }
    echo "<h1>ราคาสินค้าทั้งหมด $total บาท</h1>";
    echo "</table>";
    echo "<h1>สั่งสินค้าเรียบร้อยแล้ว</h1>";
    echo"<h2><a href='showproduct.php'>กลับไปหน้าแรก</a></h2>";
}else{
    echo "0 results";
}

// echo $_SESSION["send_id"];
?>