<!DOCTYPE html>
<html>
<head>
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
        h1{
            margin:2.8% 4.5%;
            color:black;
            font: 800 32px serif;
        }
        form{
            margin: 2px 2px
        }
        form > label {
            color:black;
            font: 500 22px serif;
        }
        form > input {
            border-radius:20px;
            margin:4px 0px ;
            padding: 10px 20px;
            font: 600 18px serif;
        }
        form > textarea {
            border-radius:20px;
            margin:4px 0px ;
            padding: 10px 20px;
            font: 600 18px serif;
        }
    </style>
</head>

<?php
session_start();
if(isset($_SESSION["cart"])){
    echo"<h1>ตะกร้าสินค้า</h1>";
    $total=0;
    echo "<table border=2px double><tr><th>ลำดับ</th><th>ID</th><th>Name</th><th>Price</th><th>Delete</th></tr>";
        for($i=0;$i<count($_SESSION["cart"]);$i++)
        {
          $item=$_SESSION["cart"][$i];
          echo "<tr><td>".($i+1)."</td>";
          echo "<td>".$item['ID']."</td>";
          echo "<td>".$item['Name']."</td>";
          echo "<td>".$item['Price']."</td>";
          echo "<td><a href='delcart.php?i=".$i."'>";
          echo "<font color='red'>X</font></a></td></tr>";
          $total+=$item['Price'];
        }
    echo "</table>";
    echo "<h1>ราคาสินค้า $total บาท</h1>";
?>
    <form action="order.php" method="post">
        <label for="FName">First name:</label><br>
        <input type="text" id="FName" name="FName" value=""><br>
        <label for="Lname">Last name:</label><br>
        <input type="text" id="Lname" name="Lname" value=""><br>
        <lable for="Address">Address:</label><br>
<textarea id="Address" name="Address"  rows="4" cols="50"></textarea><br>
        <lable for="Mobile">mobile no.:</label><br>
        <input type="text" id="Mobile" name="Mobile" value=""><br>
        <input type="submit" value="Submit">
        </form>
<?php
}
?>