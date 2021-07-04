<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student project</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>  
     <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300&display=swap" rel="stylesheet">
     <style>
     body{
    background-color:whitesmoke;

    font-family: 'Tajawal', sans-serif;
}
#container{
   width: 100%; 
   font-size: 20px;
}
main{
    float:left;
    border: 1px solid grey;
    padding: 5px;
}
input{
    padding: 4px;
    border: 2px solid black ;
    text-align: center;
    font-size: 17px;
    font-family: 'Tajawal', sans-serif;
}
aside{
    text-align: center;
    width:300px ;
    float: right;
    border: ipx solid black;
    padding:10px;
    font-size: 20px;
    background-color: silver;
    color: white;
}
#tbl{
    width: 890px;
    font-size: 20px;
    text-align: center;
}
#tbl th{
    background-color: silver;
    color: black;
    font-size: 20px;
    padding: 10px;
    text-align: center;
}
button{
    width: 190px;
    padding: 8px;
    margin-top:8px ;
    font-size: 17px;
    font-family: 'Tajawal', sans-serif;
    font-weight: bold;
}
     </style>
</head>
<body dir="rtl">
 <?php

//الاتصال مع قاعدة البيانات 
$host="localhost";
$user="mohamed";
$pass="1234";
$dp="school";
$con= mysqli_connect($host,$user,$pass,$dp);
$res=mysqli_query($con,"select * from students");
$id="";
$name="";
$address="";
if(isset($_POST['id'])){
    $id=$_POST['id'];
}
if(isset( $_POST['name'])){
    $name=$_POST['name'];
}
if(isset( $_POST['address'])){
    $address= $_POST['address'];
}
$sqls="";
if(isset($_POST['add'])){
    $sqls="insert into students values ($id,'$name','$address')";
    mysqli_query($con,$sqls);
     header("location:home.php");
}
if(isset($_POST['del'])){
    $sqls="delete from students where name='$name' ";
    mysqli_query($con,$sqls);
     header("location:home.php");
}

?> 
    <div id="container">
    <form method="post">
    <!--  لوحة التحكم-->
    <aside>
    <div id="div">
    <img src="https://i.pinimg.com/736x/99/90/45/9990457453d60b4da7ad73da33eaad5f.jpg"alt="لوجو الموقع"  width="150px"/>
    <h3>لوحة المدير</h3><br>
    <lable> رقم الطالب:</lable> <br>
    <input type="text" name="id" id="id"/> <br>
    <lable>اسم الطالب:</lable> <br>
    <input type="text" name="name" id="name"/><br>
    <lable> عنوان الطالب:</lable> <br>
    <input type="text" name="address" id="address"/> <br>
    <button name="add">اضافة طالب</button>
    <button name="del">حذف طالب</button>
    </div>
    </aside>
    <!-- عرض بيانات الطالب-->
    <main>
    <table id='tbl'>
    <tr>
    <th> الرقم التسلسلى</th>
    <th>اسم الطالب</th>
    <th>عنوان الطالب</th>
    </tr>
   <?php
   
    while($row=mysqli_fetch_array($res)){
        echo "<tr>";
         echo"<td>" .$row["id"] ."</td>";
         echo"<td>" .$row["name"] ."</td>";
         echo"<td>" .$row["address"] ."</td>";
         echo "</tr>";
     }
     ?> 
    </table>
    </main>
    </form>

    </div>
</body>
</html>