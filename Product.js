import React, { useState } from 'react';
import { Link } from "react-router-dom";
const Product=()=>{
    var bill= 0;
    const myInputRef= React.createRef();
    const [listBlinkshop, setListBlinkshop] = useState({
        Blink_list:[
            
        ]
    });
    const [productState,setProductState]=useState({
    product_list:[
        {   
            id:1,
            name: "Takamine GD10NS",
            price: 6990,
            detail:"แข็งแรงทนทานทุกสภาพอากาศ เก็บรักษาง่าย ไปได้ทุกที่",
            image:"https://i.ibb.co/B40prpP/1.jpg"
        },
        {   
            id:2,
            name: "Takamine GN11M",
            price: 5990,
            detail:"ให้เสียงกลางที่มาก และกระชับ เปิดกว้าง ให้เสียงสตรัมที่มีความเด็ดขาด และ เสียงโน็ตที่ชัดเจน",
            image:"https://i.ibb.co/T4S8LKd/2.jpg"
        },
        {   
            id:3,
            name: "Takamine GN93CE",
            price: 19990,
            detail:"โดยจะแยก Saddle เป็นสองชิ้นนั่นคือชิ้นที่ 1 จะรับผิดชอบสาย 1-2 และ ชิ้นที่ 2 จะรับผิดชอบสายที่ 3-6",
            image:"https://i.ibb.co/PFjZGGJ/3.jpg"
        },
        {   
            id:4,
            name: "Takamine GN71CE",
            price: 16990,
            detail:"Double Saddle เพื่อโน็ตเสียงที่แม่นยำตามตำแหน่งองศาของแต่ละสาย โดยจะแยก Saddle เป็นสองชิ้นนั่นคือชิ้นที่ 1 จะรับผิดชอบสาย 1-2 และ ชิ้นที่ 2 จะรับผิดชอบสายที่ 3-6",
            image:"https://i.ibb.co/H7ZW0Y4/4.jpg"
        },
        {   
            id:5,
            name: "กีต้าร์ Tom GA-T1",
            price: 5700,
            detail:"ตัวบอดี้และหัวเคลือบเงาสวยงาม ให้เสียงใส กังวาน คอจับง่าย เล่นสบาย",
            image:"https://i.ibb.co/qMyMcRf/5.jpg"
        },
        {   
            id:6,
            name: "กีต้าร์ Martin Lee ML-408C (BK)",
            price: 1900,
            detail:"เสียงดัง บาลานซ์ กังวาน  ลูกบิดโลหะโครเมียม  เคลือบเงาสวยงาม  มีเหล็กดามคอ ทำให้สามารถปรับแต่งทัชชิ่งได้",
            image:"https://i.ibb.co/ygKjXnF/6.jpg"
        },
        {   
            id:7,
            name: "กีต้าร์ Yamaha F310 SB",
            price: 4200,
            detail:"ฟรีกระเป๋า YAMAHA แท้ มูลค่า 490",
            image:"https://i.ibb.co/NSnKZRD/7.jpg"
        },
        {   
            id:8,
            name: "กีต้าร์ Crafter HD-200CE/FS.N",
            price: 6800,
            detail:"ขนาด : 40 นิ้ว",
            image:"https://i.ibb.co/TRK5r5Y/8.jpg"
        },
        {   
            id:9,
            name: "กีต้าร์ Kazuki KZF41C",
            price: 2650,
            detail:"Size 41 นิ้ว",
            image:"https://i.ibb.co/dbXm1DH/9.jpg"
        },
        {   
            id:10,
            name: "กีต้าร์ Kazuki KZF41C",
            price: 2650,
            detail:"Size 41 นิ้ว",
            image:"https://i.ibb.co/wCSSCwV/10.jpg"
        },
        ]
    });
    const addProduct =(item)=>{
        console.log("come function add")
        const Blink_list=[...listBlinkshop.Blink_list];
        console.log(Blink_list)
        Blink_list.push(item);
        setListBlinkshop({
            Blink_list:Blink_list
       });
        

    }

    const onDeleteallProduct=()=>{
        setListBlinkshop({
            Blink_list:[]
        });
    }

    const onDeleteProduct=(deleteKey)=>{
        const Blink_list=[...listBlinkshop.Blink_list];
        console.log("Delete: ",Blink_list)
        const deleteIndex = Blink_list.findIndex((item)=>{
            return item.id===deleteKey;
        });
        Blink_list.splice(deleteIndex,1);
        setListBlinkshop({
            Blink_list:Blink_list
        });
    }

   
    const onUpdateProduct=(updateKey,data)=>{
        console.log(data);
        const product_list=[...productState.product_list];
        const updateIndex = product_list.findIndex((item)=>{
            return item.id===updateKey;
        });
        product_list[updateIndex]=data;
        setProductState({
             product_list:product_list
        });
    }
     const onOkClick=(item)=>{
            const updatedata={
                id: item.id,
                name: myInputRef.current.value,
                price: item.price
            };
            console.log(myInputRef.current.value);
            onUpdateProduct(item.id,updatedata);
    }


    const show_product = productState.product_list.map((item)=>{
        return (<tr key={item.id}><td>{item.id}</td><td><img src={item.image}/></td><td><Link state={item} to="/Detail">{item.name}</Link></td><td>{item.price}</td><td>
            <button onClick={addProduct.bind(this, item)}>ลงตะกร้า</button></td>
            </tr>)
    })

    const show_blink = listBlinkshop.Blink_list.map((item)=>{
        bill += item.price
        return (<tr key={item.id}><td>{item.id}</td><td><img src={item.image}/></td><td>{item.name}</td><td>{item.price}</td><td>
            <button onClick={onDeleteProduct.bind(this, item)}>ลบ</button></td>
            
            </tr>)
    })

    
    return (
                <div>

                    <table border='1'><thead><tr><td>id</td><td>Image</td><td>name</td><td>price</td><td></td></tr></thead><tbody>{show_product}</tbody></table>
    
                <h1>ตะกร้าสินค้า</h1>
                <table border='2 double'><thead><tr><td>id</td><td>Image</td><td>name</td><td>price</td><td></td></tr></thead><tbody>{show_blink}</tbody></table>
                <button onClick={onDeleteallProduct.bind(this)}>ลบทั้งหมด</button>
                
                <h1>เงินรวม</h1>
                {bill}

                
            </div>);
}
export default Product;