<!DOCTYPE html>
<html>
<head>
    <title>ElectricalAppliance</title>
</head>
<body>
    <h1>Electrical Appliance</h1>
    <?php
        $product = '[
            {
                "id":"1",
                "name":"ตู้เย็น 2 ประตู ELECTROLUX ETB3400K-A 11 คิว สีเงิน",
                "price":11690, 
                "img":"img/img1.jpg"
            },
            {
                "id":"2",
                "name":"เครื่องซักผ้าฝาหน้า ELECTROLUX EWF1141R9SB 11 กก. อินเวอร์เตอร์ +ขาตั้ง",
                "price":36711, 
                "img":"img/img2.jpg"
            },
            {
                "id":"3",
                "name":"แอร์ผนัง ELECTROLUX ESV18CRU-A1 18000บีทียู อินเวอร์เตอร์",
                "price":39990, 
                "img":"img/img3.jpg"
            },
            {
                "id":"4",
                "name":"แอร์ผนัง ELECTROLUX ESV12CRR-B4 12043 บีทียู อินเวอร์เตอร์",
                "price":17091, 
                "img":"img/img4.jpg"
            },
            {
                "id":"5",
                "name":"พัดลมไอเย็น PERFECTBRANDZ PB 11C 30 ลิตร ขาว/ดำ",
                "price":9990, 
                "img":"img/img5.jpg"
            },
            {
                "id":"6",
                "name":"ไมโครเวฟระบบอุ่น TOSHIBA MW2-MM24PC 24 ลิตร",
                "price":2690, 
                "img":"img/img6.jpg"
            },
            {
                "id":"7",
                "name":"ไมโครเวฟระบบอุ่น ELECTROLUX EMM30D510EB 30 ลิตร",
                "price":4761, 
                "img":"img/img7.jpg"
            },
            {
                "id":"8",
                "name":"เครื่องรีดผ้าไอน้ำ TEFAL QT2020 1.1ลิตร",
                "price":13592, 
                "img":"img/img8.jpg"
            },
            {
                "id":"9",
                "name":"เตารีดแรงดันไอน้ำ TEFAL GV9612 1.9 ลิตร",
                "price":18810, 
                "img":"img/img9.jpg"
            },
            {
                "id":"10",
                "name":"เครื่องเตรียมอาหาร TEFAL DO821838",
                "price":4360, 
                "img":"img/img10.jpg"
            }
            ]';

            function createTable($obj)
            {
                $ElectricalAppliance = json_decode($obj, true);
                $table = "<table style = 'padding'>
                        <tr><th style = 'border: 2px double blue '>id</th> 
                            <th style = 'border: 2px double blue '>name</th>
                            <th style = 'border: 2px double blue '>price</th>
                            <th style = 'border: 2px double blue '>img</th>
                        </tr>"; 
                for ($i=0; $i < 10 ; $i++) { 
                    foreach ($ElectricalAppliance[$i] as $ele => $value ) {
                        $r=rand(0,256);
                        $g=rand(0,256);
                        $b=rand(0,256);

                        if($r != 255 && $g != 255 && $b != 255){
                            if($ele == 'id'){
                                $table .="<tr style='border: 2px double rgb($r,$g,$b);color:rgb($r,$g,$b)'><th style='border: 2px double rgb($r,$g,$b);color:rgb($r,$g,$b)'>$value</th>";
                            }
                            else if($ele == 'name'){
                                $table .="<th style='border: 2px double rgb($r,$g,$b);color:rgb($r,$g,$b)'>$value</th>";
                            }
                            else if($ele == 'price'){
                                $table .="<th style='border: 2px double rgb($r,$g,$b);'color:rgb($r,$g,$b)'>$value</th>";
                            }else{
                                $table .="<th style='border: 2px double rgb($r,$g,$b);color:rgb($r,$g,$b)'><img width='750' height='650' src='$value'></th></tr>";
                            }
                        }
                    }
                }
            $table .= "</table>";
            return $table;
        }
        echo createTable($product);
    ?>

</body>
</html>